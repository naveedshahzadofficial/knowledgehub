<script>
import BaseModalComponent from "./BaseModalComponent";
import StarRating from "vue-star-rating";
import {useAssets} from "../composable/use-assets";

export default {
    name: "RlcoDetailComponent",
    components: {
        BaseModalComponent,
        StarRating,
    },
    props: {
        rlco_detail: Object,
        isOverFlow: Boolean,
    },
    data: () => ({
        base_url: process.env.MIX_BASE_URL,
        isShowModal: false,
        isShowModalRenewal: false,
        isShowModalDocumentRequirement: [],
        feedbackForm: {
            rating: null,
            feedback: "",
        },
        feedback_label: "Glad to know any additional feedback",
        isSubmitted: false,
        printObj: {
            id: "eBizService1-tab-pane",
            popTitle: "Knowledge Hub",
            extraCss: process.env.MIX_BASE_URL + "/assets/print.css",
        },
        isExpand: false,
        tabs : [
            { id: "requirement-tab", label: "Requirements" },
            { id: "mistakes-tab", label: "Common Mistakes" },
            { id: "helpDocuments-tab", label: "Help Documents" },
            { id: "faqs-tab", label: "FAQs" },
            { id: "dependencies-tab", label: "Dependencies" },
        ],
        activeTab: 0,

    }),
    mounted() {
        if (!this.isOverFlow) {
            window.addEventListener("scroll", this.handleScroll);
            this.$refs.detail_page.addEventListener(
                "scroll",
                this.handleDetailScroll
            );
        }
    },
    watch: {
        rlco_detail: function (newVal, oldVal) {
            // watch it
            if (oldVal && !this.isOverFlow) {
                this.$refs.detail_page.scrollTo(0, 0);
                this.isShowModalRenewal = false;
                this.isShowModalDocumentRequirement = Array(this.rlco_detail.required_documents).fill(false);
                this.feedbackForm = { rating: null, feedback: "" };
                this.feedback_label = "Glad to know any additional feedback";
                this.isSubmitted = false;
                this.activeTab=0;
            }
        },
    },
    computed: {
        currentRatingText() {
            return this.feedbackForm.rating
                ? "You have selected " + this.feedbackForm.rating + " stars"
                : "Please select your rating";
        },
        currentFeedbackLabel() {
            if (this.feedbackForm.rating <= 3) {
                this.feedback_label = "Tell us how can we improve";
            } else {
                this.feedback_label = "Glad to know any additional feedback";
            }
            return this.feedback_label;
        },
        feedbacks() {
            if (localStorage.getItem("rlcoFeedbacks")) {
                return JSON.parse(localStorage.getItem("rlcoFeedbacks"));
            }
            return [];
        },
        checkFeedbackExits() {
            let rlco = this.feedbacks.filter(
                (rlco) => rlco.rlco_id === this.rlco_detail?.id
            );
            return !!(rlco && rlco.length);
        },
    },
    methods: {
        useAssets,
        setActiveTab(index) {
            this.activeTab = index;
        },
        getTabClasses(index){
            return {
                "nav-link": true,
                 active: this.activeTab === index,
            }
        },
        toggleModal() {
            this.isShowModal = !this.isShowModal;
        },
        toggleModalRenewal() {
            this.isShowModalRenewal = !this.isShowModalRenewal;
        },
        toggleModalDocumentRequirement(index) {
            this.isShowModalDocumentRequirement[index] = !this.isShowModalDocumentRequirement[index];
        },
        scrollToTop() {
            let refDiv = this.$refs.detail_page;
            refDiv.scrollTo({
                top: 0,
                behavior: "smooth",
            });
        },
        handleScroll: function () {
            let scrollY = window.scrollY;
            document.querySelector(".scroll-top").style.bottom =
                50 + scrollY + "px";
        },
        handleDetailScroll: function () {
            let scrollTop = this.$refs.detail_page.scrollTop;
            if (scrollTop > 200) {
                document.querySelector(".scroll-top").style.display = "block";
            } else {
                document.querySelector(".scroll-top").style.display = "none";
            }
        },
        submitFeedback: function () {
            this.isSubmitted = true;
            axios
                .post(`review/${this.rlco_detail?.id}`, this.feedbackForm)
                .then((response) => {
                    let feedback = { rlco_id: response.data.id };
                    localStorage.setItem(
                        "rlcoFeedbacks",
                        JSON.stringify([...this.feedbacks, feedback])
                    );
                    this.loading = false;
                })
                .catch((error) => {
                    this.loading = false;
                });
        },
        openDetailPage: function () {
            let routeData = this.$router.resolve({
                name: "rlcos.show",
                params: { id: this.rlco_detail.id },
            });
            window.open(routeData.href, "_blank");
        },
    },
};
</script>
<template>
    <div class="tab-pane fade show active" id="eBizService1-tab-pane" role="tabpanel" aria-labelledby="eBizService1-tab" tabindex="0">
        <div class="row">
            <div class="col-11">
                <div class="searchedServiceData text-start mb-2">
                    <p class="mb-0 d-inline-block px-4 py-0">{{ rlco_detail.scope }}</p>
                </div>
                <h3 class="mb-2" v-text="rlco_detail?.rlco_name ? rlco_detail?.rlco_name : 'No RLCOs found.'"></h3>
                <h4 class="d-inline-block px-3 py-2 mb-3">
                    <span class="d-inline-block me-2"></span> {{ rlco_detail.department?.department_name }}
                </h4>
                <h5 class="mb-0 text-justify" v-html="rlco_detail.description"></h5>
            </div>
            <div class="col-1 pt-4">
                <button v-if="rlco_detail?.id && isOverFlow" v-print="printObj" class="bg-transparent border-0">
                    <i class="fa-solid fa-print fs-3"></i>
                </button>
            </div>
            <div class="col-12">
                <div class="dotted-line my-4"></div>
            </div>
            <div class="col-12 mb-4">
                <ul
                    class="nav nav-tabs border-0 justify-content-between overflow-x-auto overflow-y-hidden flex-nowrap"
                    id="eBizServicesTab2"
                    role="tablist"
                >
                    <li
                        class="nav-item"
                        role="presentation"
                        v-for="(tab, index) in tabs"
                        :key="tab.id"
                    >
                        <button
                            :class="getTabClasses(index)"
                            :id="tab.id"
                            type="button"
                            role="tab"
                            :aria-controls="`${tab.id}-pane`"
                            :aria-selected="activeTab === index"
                            @click="setActiveTab(index)"
                        >
                            {{ tab.label }}
                        </button>
                    </li>
                </ul>
            </div>
            <div class="col-12">
                <div class="tab-content" id="eBizServicesTab2Content">
                    <div v-if="activeTab === 0"  :class="{ show: activeTab === 0, active: activeTab === 0 }" class="tab-pane fade" id="requirement-tab-pane" role="tabpanel" aria-labelledby="requirement-tab" tabindex="0">
                        <div class="card mb-3">
                            <div class="card-body" v-if="rlco_detail.required_documents?.length > 0">
                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <thead>
                                        <tr>
                                            <td scope="col">Document</td>
                                            <td scope="col">Original</td>
                                            <td scope="col">Photocopies</td>
                                            <td scope="col">Attestation</td>
                                            <td scope="col">Requirement</td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr v-for="(document, index ) in rlco_detail.required_documents">
                                            <td scope="row"><p class="mb-0 ps-3">{{ document.document_title }}</p></td>
                                            <td>
                                                <span v-if="document.document_type.indexOf('Original') !== -1"><img :src="useAssets('assets/tick-icon.svg')" alt="tick icon"></span>
                                                <span  v-if="document.document_type.indexOf('Original') == -1"><img :src="useAssets('assets/cross-icon.svg')" alt="cross-icon"></span>
                                            </td>
                                            <td>
                                                <span v-if="document.document_type.indexOf('Photocopies') !== -1"><img :src="useAssets('assets/tick-icon.svg')" alt="tick icon"></span>
                                                <span  v-if="document.document_type.indexOf('Photocopies') == -1"><img :src="useAssets('assets/cross-icon.svg')" alt="cross-icon"></span>
                                            </td>
                                            <td>
                                                <span v-if="document.document_type.indexOf('Attestation') !== -1"><img :src="useAssets('assets/tick-icon.svg')" alt="tick icon"></span>
                                                <span  v-if="document.document_type.indexOf('Attestation') == -1"><img :src="useAssets('assets/cross-icon.svg')" alt="cross-icon"></span>
                                            </td>
                                            <td>
                                                <base-modal-component
                                                    title="Document Requirement Remarks"
                                                    @toggle-modal="toggleModalDocumentRequirement(index)"
                                                    v-if="isShowModalDocumentRequirement[index]"
                                                >
                                                    <div v-html="document.document_requirement_remarks"></div>
                                                </base-modal-component>

                                                <span v-if="document.document_requirement_type === 'Conditional'"
                                                      @click.prevent="toggleModalDocumentRequirement(index)"
                                                      class="make-link"
                                                >{{ document.document_requirement_type }}</span>
                                                <span v-else>{{ document.document_requirement_type }}</span>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="card mb-3">
                            <div class="card-body">
                                <h6 class="mb-0 d-flex align-items-center justify-content-between">
                                    <span>Business Category/ Section:</span>
                                    <span>{{ rlco_detail.business_category?.category_name }}</span>
                                </h6>
                            </div>
                        </div>

                        <div class="card mb-3" v-if="rlco_detail.title_of_law && rlco_detail.link_of_law">
                            <div class="card-body">
                                <h6 class="mb-0 d-flex align-items-center justify-content-between">
                                    <span>Enforcing Law:</span>
                                    <span><a target="_blank" :href="rlco_detail.link_of_law">{{ rlco_detail.title_of_law }}</a></span>
                                </h6>
                            </div>
                        </div>
                        <div class="card mb-3" v-if="rlco_detail.fee_question">
                            <div class="card-body">
                                <h6 class="mb-0 d-flex align-items-center justify-content-between">
                                    <span>Fee (PKR):</span>
                                    <span
                                        v-if="
                                        rlco_detail.fee_question === 'Yes' &&
                                        rlco_detail.fee_plan === 'Schedule' &&
                                        rlco_detail.fee_schedule
                                    "
                                        @click.prevent="toggleModal"
                                        class="make-link"
                                        style="cursor: pointer;"
                                    >Fee Details</span
                                    >
                                    <span
                                        v-else-if="
                                        rlco_detail.fee_question === 'Yes' &&
                                        rlco_detail.fee_plan === 'Single Fee' &&
                                        rlco_detail.fee
                                    "
                                    >{{ rlco_detail.fee }}</span
                                    >
                                    <span v-else>Not Applicable</span>
                                </h6>
                            </div>
                        </div>

                        <div class="card mb-3" v-if="rlco_detail.fee_question === 'Yes'">
                            <div class="card-body">
                                <h6 class="mb-0 d-flex align-items-center justify-content-between">
                                    <span>Payment Mode:</span>
                                    <span>{{ rlco_detail.fee_submission_mode }}</span>
                                </h6>
                            </div>
                        </div>

                        <div class="card mb-3" v-if="rlco_detail.time_taken || rlco_detail.time_unit">
                            <div class="card-body">
                                <h6 class="mb-0 d-flex align-items-center justify-content-between">
                                    <span>Processing Time:</span>
                                    <span>{{ rlco_detail.time_taken }}&nbsp;{{ rlco_detail.time_unit }}</span>
                                </h6>
                            </div>
                        </div>

                        <div class="card mb-3" v-if="rlco_detail.renewal_required === 'Yes' && rlco_detail.validity">
                            <div class="card-body">
                                <h6 class="mb-0 d-flex align-items-center justify-content-between">
                                    <span>Validity:</span>
                                    <span>{{ rlco_detail.validity }}</span>
                                </h6>
                            </div>
                        </div>

                        <div class="card mb-3" v-if="rlco_detail.renewal_required">
                            <div class="card-body">
                                <h6 class="mb-0 d-flex align-items-center justify-content-between">
                                    <span>Renewal Fee (PKR):</span>
                                    <span
                                        v-if="
                                        rlco_detail.renewal_required ===
                                            'Yes' &&
                                        rlco_detail.renewal_fee_plan ===
                                            'Schedule' &&
                                        rlco_detail.renewal_fee_schedule
                                    "
                                        @click.prevent="toggleModalRenewal"
                                        class="make-link"
                                    >Renewal Fee Details</span
                                    >
                                    <span
                                        v-else-if="
                                        rlco_detail.renewal_required ===
                                            'Yes' &&
                                        rlco_detail.renewal_fee_plan ===
                                            'Single Fee' &&
                                        rlco_detail.renewal_fee
                                    "
                                    >{{ rlco_detail.renewal_fee }}</span
                                    >
                                    <span v-else>Not Applicable</span>
                                </h6>
                            </div>
                        </div>

                        <div class="card mb-3" v-if="rlco_detail.mode_of_inspection && 1 == 2">
                            <div class="card-body">
                                <h6 class="mb-0 d-flex align-items-center justify-content-between">
                                    <span>Inspection:</span>
                                    <span>{{
                                            rlco_detail.inspection_required == "None"
                                                ? "Not Applicable"
                                                : "Applicable"
                                        }}</span>
                                </h6>
                            </div>
                        </div>

                        <div class="card mb-3" v-if="rlco_detail.mode_of_inspection && 1 == 2">
                            <div class="card-body">
                                <h6 class="mb-0 d-flex align-items-center justify-content-between">
                                    <span>Mode of Inspection:</span>
                                    <span>{{ rlco_detail.mode_of_inspection }}</span>
                                </h6>
                            </div>
                        </div>

                        <div class="card mb-3" v-if="rlco_detail.inspection_department && 1 == 2">
                            <div class="card-body">
                                <h6 class="mb-0 d-flex align-items-center justify-content-between">
                                    <span>Joint inspection with:</span>
                                    <span>{{
                                            rlco_detail.inspection_department
                                                ?.department_name
                                        }}</span>
                                </h6>
                            </div>
                        </div>

                        <div class="card mb-3" v-if="rlco_detail.fine_details && 1 == 2">
                            <div class="card-body">
                                <h6 class="mb-0 d-flex align-items-center justify-content-between">
                                    <span>Fine Details:</span>
                                    <span v-html="rlco_detail.fine_details"></span>
                                </h6>
                            </div>
                        </div>

                        <div class="card mb-3" v-if="rlco_detail.process_flow_diagram_file">
                            <div class="card-body">
                                <h6 class="mb-0 d-flex align-items-center justify-content-between">
                                    <span>Process Flow Diagram:</span>
                                    <span><a
                                        target="_blank"
                                        :href="
                                        rlco_detail.process_flow_diagram_file
                                    "
                                        download
                                    ><font-awesome-icon icon="download"
                                    /></a></span>
                                </h6>
                            </div>
                        </div>
                    </div>
                    <div v-else-if="activeTab === 1" :class="{ show: activeTab === 1, active: activeTab === 1 }" class="tab-pane fade" id="mistakes-tab-pane" role="tabpanel" aria-labelledby="mistakes-tab" tabindex="0">
                        <div class="row" v-if="rlco_detail.foss?.length > 0">
                            <div class="col-12"  v-for="(fos, index) in rlco_detail.foss">
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <h6 class="mb-0 d-flex align-items-center justify-content-between">
                                            <span>{{ fos.fos_observation }} <span v-if="fos.fos_file"
                                            ><a
                                                :href="fos.fos_file"
                                                target="_blank"
                                                download
                                            ><font-awesome-icon
                                                icon="download" /></a
                                            ></span></span>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div v-else-if="activeTab === 2" :class="{ show: activeTab === 2, active: activeTab === 2 }" class="tab-pane fade" id="helpDocuments-tab-pane" role="tabpanel" aria-labelledby="helpDocuments-tab" tabindex="0">
                        <div class="row" v-if="rlco_detail.other_documents?.length > 0">
                            <div class="col-12" v-for="(document, index) in rlco_detail.other_documents">
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <h6 class="mb-0 d-flex align-items-center justify-content-between">
                                            <span>{{ document.document_title }}</span>
                                            <span v-if="document.document_file">
                                                <a target="_blank" class="bg-transparent border-0" :href="document.document_file" download>
                                                    <img :src="useAssets('assets/download-icon.svg')" alt="">
                                                </a>
                                            </span>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div v-else-if="activeTab === 3" :class="{ show: activeTab === 3, active: activeTab === 3 }" class="tab-pane fade" id="faqs-tab-pane" role="tabpanel" aria-labelledby="faqs-tab" tabindex="0">
                        <div class="row">
                            <div class="col-12" v-if="rlco_detail.faqs?.length > 0">
                                <div class="accordion faqsServiceAccordion" id="accordionExample" v-if="rlco_detail.faqs?.length > 0">
                                    <div v-for="(faq, index) in rlco_detail.faqs" class="accordion-item mb-3">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button py-4" type="button" data-bs-toggle="collapse" :data-bs-target="`#collapse${index}`" aria-expanded="true" :aria-controls="`collapse${index}`">
                                                {{ faq.faq_question }}
                                            </button>
                                        </h2>
                                        <div :id="`collapse${index}`" class="accordion-collapse collapse" :class="{show: index == 0}" data-bs-parent="#accordionExample">
                                            <div class="accordion-body pt-0">
                                                <div v-html="faq.faq_answer"></div>
                                                <div v-if="faq.faq_file">
                                                    <a
                                                        class="btn"
                                                        :href="faq.faq_file"
                                                        target="_blank"
                                                        download
                                                    >Download attachment
                                                        <font-awesome-icon icon="download"
                                                        /></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div v-else-if="activeTab === 4" :class="{ show: activeTab === 4, active: activeTab === 4 }" class="tab-pane fade" id="dependencies-tab-pane" role="tabpanel" aria-labelledby="dependencies-tab" tabindex="0">
                        <div class="row">
                            <div class="col-12" v-if="rlco_detail.dependencies?.length > 0">
                                <div class="accordion faqsServiceAccordion" id="accordionExample">
                                    <div class="accordion-item mb-3 expanded" v-for="(dependency, index) in rlco_detail.dependencies">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button py-4" type="button" data-bs-toggle="collapse" :data-bs-target="`#collapse_${index}`" aria-expanded="true" :aria-controls="`collapse_${index}`">
                                                {{ dependency.activity_name }}
                                            </button>
                                        </h2>
                                        <div :id="`collapse_${index}`" class="accordion-collapse collapse" :class="{show: index == 0}" data-bs-parent="#accordionExample">
                                            <div class="accordion-body pt-0">
                                                From
                                                {{ dependency.department?.department_name }}                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="detail-btn my-3 d-flex justify-content-center">
                    <div
                        v-if="
                            rlco_detail.automation_status != 'No Information' &&
                            rlco_detail.application_url"
                    >
                        <a
                            class="btn btn-sm px-3 text-light custom-detail-btn"
                            target="_blank"
                            :href="rlco_detail.application_url"
                        >Apply Online</a
                        >
                    </div>
                    <div v-else><a
                        class="btn btn-sm px-3 text-light custom-detail-btn"
                        target="_blank"
                        href="https://bfc.punjab.gov.pk"
                    >Visit BFC</a
                    ></div>
                    &nbsp;&nbsp;
                    <div v-if="rlco_detail.department_website">
                        <a
                            class="btn btn-sm px-3 text-light custom-detail-btn"
                            target="_blank"
                            :href="rlco_detail.department_website"
                        >Department Website</a
                        >
                    </div>
                </div>
                <div
                    v-if="rlco_detail.last_updated_date"
                    class="row detail-btn my-3 mb-2 d-none"
                >
                    <div class="col-lg-12 text-left">
                        <span class="last-updated-date"
                        >Last verified:
                            {{ rlco_detail.last_updated_date }}</span
                        >
                    </div>
                </div>
                <div
                    v-show="!isSubmitted && !checkFeedbackExits"
                    class="row feedback-div d-none"
                >
                    <div class="col-lg-12">
                        <h3 class="detail-heading pt-3 pb-2">
                            Rating & Review
                        </h3>
                        <div class="text-body">
                            How would you rate this information?
                        </div>
                    </div>
                </div>
                <div
                    v-show="!isSubmitted && !checkFeedbackExits"
                    class="row mb-4 feedback-div d-none"
                >
                    <div class="col-lg-12 text-left">
                        <star-rating
                            :star-size="30"
                            :show-rating="false"
                            @update:rating="feedbackForm.rating = $event"
                        />
                    </div>
                    <div
                        v-show="feedbackForm.rating"
                        class="col-lg-12 mt-3 mb-5 feedback-div"
                    >
                        <label
                            for="feedback"
                            v-text="currentFeedbackLabel"
                        ></label>
                        <textarea
                            class="form-control"
                            name="feedback"
                            id="feedback"
                            v-model="feedbackForm.feedback"
                            cols="2"
                            rows="2"
                        ></textarea>
                        <button
                            class="btn btn-dark start-service-btn px-3 text-light custom-detail-btn mt-3"
                            @click.prevent="submitFeedback"
                        >
                            Submit
                        </button>
                    </div>
                </div>
                <div v-show="isSubmitted" class="row mb-4 feedback-div d-none">
                    <div class="col-lg-12 text-center">
                        Thank you for your feedback!
                    </div>
                </div>
            </div>
        </div>
        <base-modal-component
            title="Fee Details"
            @toggle-modal="toggleModal"
            v-if="isShowModal"
        >
            <div v-html="rlco_detail?.fee_schedule"></div>
        </base-modal-component>

        <base-modal-component
            title="Renewal Fee Details"
            @toggle-modal="toggleModalRenewal"
            v-if="isShowModalRenewal"
        >
            <div v-html="rlco_detail?.renewal_fee_schedule"></div>
        </base-modal-component>
    </div>
</template>



<style scoped></style>
