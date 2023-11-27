<?php

namespace App\Http\Livewire;

use App\Models\Account;
use App\Models\Bank;
use App\Models\District;
use App\Models\Tehsil;
use Livewire\Component;

class AccountInfoForm extends Component
{
    public $form;
    public $accountInfo;
    public $accounts;
    public $rlco;
    public $account_form;
    public $provinces;
    public $districts;
    public $tehsils;
    public $banks;

    protected $listeners = ['confirmDelete'];

    protected $rules = [
    'form.account_type' => 'required',
    'form.applicable_at_level' => 'required',
    'account_form.district_id' => 'required_if:form.applicable_at_level,District|required_if:form.applicable_at_level,Tehsil',
    'account_form.tehsil_id' => 'required_if:form.applicable_at_level,Tehsil',
    'account_form.bank_id' => 'required',
    'account_form.branch' => 'sometimes|nullable',
    'account_form.account_title' => 'required',
    'account_form.account_no' => 'required',
    ];
    protected $messages = [
    'form.account_type.required' => 'Account Type is required.',
    'form.applicable_at_level.required' => 'Applicable at level is required.',
    'account_form.district_id.required_if' => 'District is required.',
    'account_form.tehsil_id.required_if' => 'Tehsil is required.',
    'account_form.bank_id.required' => 'Bank is required.',
    'account_form.account_title.required' => 'Account Title is required.',
    'account_form.account_no.required' => 'Account No. is required.',
    ];

    public function render()
    {
        return view('livewire.account-info-form');
    }

    public function mount()
    {
        $this->rlco->load('accountInfo');
        $this->districts = District::active()->where('province_id', 7)->get();
        $this->tehsils = Collect();
        $this->banks = Bank::active()->get();
        $this->accounts = Collect();
        if($this->rlco->accountInfo){
            $this->accountInfo = $this->rlco->accountInfo;
            $this->form = $this->rlco->accountInfo->toArray();
            $this->loadAccounts();
        }
    }

    public function ucAccountInfo(){
        $this->validate([
            'form.account_type' => 'required',
            'form.applicable_at_level' => 'required',
            ], [
                'form.account_type.required' => 'Account Type is required.',
                'form.applicable_at_level.required' => 'Applicable at level is required.',
           ]);
        $this->accountInfo = $this->rlco->accountInfo()->updateOrCreate(['rlco_id' => $this->rlco->id],$this->form);
        $this->form['id'] = $this->accountInfo->id;
        $this->successAlert();
    }

    public function addAccount()
    {
        $this->validate();

        if(!$this->accountInfo) {
            $this->ucAccountInfo();
        }

        if($this->form['applicable_at_level'] == 'Province'){
            $this->account_form['district_id'] = null;
            $this->account_form['tehsil_id'] = null;
        }else if($this->form['applicable_at_level'] == 'District')
        {
            $this->account_form['tehsil_id'] = null;
        }
        $this->account_form['province_id']= 7;
        $this->account_form['account_info_id']= $this->accountInfo->id;
        Account::create($this->account_form);
        $this->dispatchBrowserEvent('account-info:select2',['id'=>'#district_id','key_name'=>'account_form.district_id']);
        $this->dispatchBrowserEvent('account-info:select2',['id'=>'#tehsil_id','key_name'=>'account_form.tehsil_id']);
        $this->dispatchBrowserEvent('account-info:select2',['id'=>'#bank_id','key_name'=>'account_form.bank_id']);
        $this->reset('account_form');
        $this->successAlert();
        $this->loadAccounts();
    }

    public function editAccount($account_id){
        $account = Account::find($account_id);
        if($account){
            $this->account_form = $account->toArray();
            $this->dispatchBrowserEvent('select2:setValue',['id'=>'#district_id','value'=>$account->district_id]);
            $this->dispatchBrowserEvent('select2:setValue',['id'=>'#bank_id','value'=>$account->bank_id]);
        }
    }

    public function updateAccount($account_id){
        $account = Account::find($account_id);
        $this->validate();

        if($this->form['applicable_at_level'] == 'Province'){
            $this->account_form['district_id'] = null;
            $this->account_form['tehsil_id'] = null;
        }else if($this->form['applicable_at_level'] == 'District')
        {
            $this->account_form['tehsil_id'] = null;
        }

        $account->update($this->account_form);
        $this->dispatchBrowserEvent('account-info:select2',['id'=>'#bank_id','key_name'=>'account_form.bank_id']);
        $this->dispatchBrowserEvent('account-info:select2',['id'=>'#district_id','key_name'=>'account_form.district_id']);
        $this->dispatchBrowserEvent('account-info:select2',['id'=>'#tehsil_id','key_name'=>'account_form.tehsil_id']);
        $this->reset('account_form');
        $this->successAlert();
        $this->loadAccounts();
    }

    private function successAlert(){
        $this->dispatchBrowserEvent('toastr:message',[
            'type'=> 'success',
            'title'=> 'Record has been saved successfully.',
            'text'=> '',
        ]);
    }

    public function deleteAccount($account_id)
    {
        $account = Account::find($account_id);
        $account->delete();
        $this->loadAccounts();
    }

    private function loadAccounts()
    {
        $this->accounts = Account::with( 'district', 'tehsil', 'bank')->where('account_info_id', $this->accountInfo->id)->get();
    }

    public function confirmDelete($type, $id){
        switch (strtolower(trim($type))){
            case 'account':
                $this->deleteAccount($id);
                break;
        }
    }

    public function confirmDialog($type, $id){
        $this->dispatchBrowserEvent('confirm:delete',[
            'type'=> $type,
            'id'=> $id,
        ]);
    }

    public function updatedAccountFormDistrictId($value){
        $this->tehsils = Tehsil::active()->where('district_id', $value)->get();
        $this->dispatchBrowserEvent('account-info:refill-select2',[
            'data'=>$this->tehsils,
            'field_name'=>'tehsil_name_e',
            'select2_id'=>'#tehsil_id',
            'selected_id'=>$this->account_form['tehsil_id']??0
        ]);
    }

}
