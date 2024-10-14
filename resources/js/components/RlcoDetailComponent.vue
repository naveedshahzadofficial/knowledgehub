<template>
    <div id="printSection">
        <main class="confirmation-compliance-page">
            <!-- Header Section -->
            <div class="bg-light-grey pb-4">
                <!-- Breadcrumb Navigation -->
                <div class="container py-2">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><i class="fas fa-angle-left"></i></li>
                            <li class="breadcrumb-item"><router-link :to="{ name: 'home'}">Home</router-link></li>
                            <li class="breadcrumb-item"><router-link :to="{ name: 'services'}">Services</router-link></li>
                            <li class="breadcrumb-item"><a >Service Detail</a></li>
                        </ol>
                    </nav>
                </div>
                <div class="container mt-4">
                    <h1 class="display-6">eBiz Services</h1>
                    <p class="lead">Your trusted partner for personalised business support and guidance.</p>
                </div>
            </div>
            <div class="container mt-4">
                <div class="row float-end">
                <span
                    v-if="rlco_detail?.id && isOverFlow"
                    class="view-detail-icon"
                    v-print="printObj"
                    title="Print Page"
                ><font-awesome-icon icon="print"
                /></span>
                </div>
                <div class="clearfix"></div>
                <div class="row mt-4">
                    <div class="col-lg-6 mb-4">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <div class="d-flex justify-content-between w-100">
                                    <h5 class="card-title compliance-heading" v-text="rlco_detail?.rlco_name ? rlco_detail?.rlco_name : 'No RLCOs found.'"></h5>
                                    <p class="provincial-text">{{ rlco_detail.scope }}</p>
                                </div>
                                <div class="d-flex justify-content-between w-100 align-items-center">
                                <span class="badge bg-primary mb-2 epa-badge"><i
                                    class="fas fa-circle"></i><span>{{ rlco_detail.department?.department_name }}</span></span>
                                    <button class="btn btn-dark float-end start-service-btn d-none">Start Service</button>
                                </div>
                                <p class="after-completion-text" v-html="rlco_detail.description"></p>

                            </div>
                        </div>

                        <div class="card shadow-sm mt-4" v-if="rlco_detail.required_documents?.length > 0">
                            <div class="card-body p-0">
                                <table class="table table-bordered complianceTbl">
                                    <thead>
                                    <tr>
                                        <th>Document</th>
                                        <th>Original</th>
                                        <th>Photocopies</th>
                                        <th>Attestation</th>
                                        <th>Requirement</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="(
                                document, index
                            ) in rlco_detail.required_documents">
                                        <td>{{ document.document_title }}</td>
                                        <td>
                                            <span v-if="document.document_type.indexOf('Original') !== -1"><i class="fas fa-check-circle"></i></span>
                                            <span  v-if="document.document_type.indexOf('Original') == -1"><i class="far fa-times-circle"></i></span>
                                        </td>
                                        <td>
                                            <span v-if="document.document_type.indexOf('Photocopies') !== -1"><i class="fas fa-check-circle"></i></span>
                                            <span  v-if="document.document_type.indexOf('Photocopies') == -1"><i class="far fa-times-circle"></i></span>
                                        </td>
                                        <td>
                                            <span v-if="document.document_type.indexOf('Attestation') !== -1"><i class="fas fa-check-circle"></i></span>
                                            <span  v-if="document.document_type.indexOf('Attestation') == -1"><i class="far fa-times-circle"></i></span>
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
                    <div class="col-lg-6">
                        <div>
                            <ul class="list-unstyled enforcing-list">
                                <li class="shaow-sm mb-2"><span><strong>Business Category/ Section:</strong></span> <span>{{ rlco_detail.business_category?.category_name }}</span></li>
                                <li v-if="rlco_detail.title_of_law && rlco_detail.link_of_law" class="shaow-sm mb-2"><span><strong>Enforcing Law:</strong></span> <span><a target="_blank" :href="rlco_detail.link_of_law">{{ rlco_detail.title_of_law }}</a></span></li>
                                <li v-if="rlco_detail.fee_question" class="shaow-sm mb-2"><span><strong>Fee (PKR):</strong></span>
                                    <span
                                        v-if="
                                        rlco_detail.fee_question === 'Yes' &&
                                        rlco_detail.fee_plan === 'Schedule' &&
                                        rlco_detail.fee_schedule
                                    "
                                        @click.prevent="toggleModal"
                                        class="make-link"
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
                                </li>
                                <li v-if="rlco_detail.fee_question === 'Yes'" class="shaow-sm mb-2"><span><strong>Payment Mode:</strong></span> <span>{{ rlco_detail.fee_submission_mode }}</span></li>
                                <li v-if="rlco_detail.time_taken || rlco_detail.time_unit" class="shaow-sm mb-2"><span><strong>Processing Time:</strong></span> <span>{{ rlco_detail.time_taken }}&nbsp;{{ rlco_detail.time_unit }}</span></li>
                                <li v-if="rlco_detail.renewal_required === 'Yes' && rlco_detail.validity" class="shaow-sm mb-2"><span><strong>Validity:</strong></span> <span>{{ rlco_detail.validity }}</span></li>
                                <li v-if="rlco_detail.renewal_required" class="shaow-sm mb-2"><span><strong>Renewal Fee (PKR):</strong></span>
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
                                </li>
                                <li v-if="rlco_detail.inspection_required" class="shaow-sm mb-2"><span><strong>Inspection:</strong></span> <span>
                                    {{
                                        rlco_detail.inspection_required == "None"
                                            ? "Not Applicable"
                                            : "Applicable"
                                    }}
                                </span></li>
                                <li class="shaow-sm mb-2" v-if="rlco_detail.mode_of_inspection && 1 == 2">
                                    <span><strong>Mode of Inspection:</strong></span>
                                    <span>{{ rlco_detail.mode_of_inspection }}</span>
                                </li>
                                <li class="shaow-sm mb-2" v-if="rlco_detail.inspection_department && 1 == 2">
                                    <span><strong>Joint inspection with</strong></span>
                                    <span>
                                        {{
                                            rlco_detail.inspection_department
                                                ?.department_name
                                        }}
                                    </span>
                                </li>
                                <li class="shaow-sm mb-2" v-if="rlco_detail.fine_details && 1 == 2">
                                    <span><strong>Fine Details</strong></span>
                                    <span><p v-html="rlco_detail.fine_details"></p></span>
                                </li>

                                <li class="shaow-sm mb-2" v-if="rlco_detail.process_flow_diagram_file">
                                    <span><strong>Process Flow Diagram</strong></span>
                                    <span>
                                        <a
                                            target="_blank"
                                            :href="
                                        rlco_detail.process_flow_diagram_file
                                    "
                                            download
                                        ><font-awesome-icon icon="download"
                                        /></a>
                                    </span>
                                </li>
                            </ul>
                        </div>
                        <ul class="nav nav-tabs mt-4" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="mistakes-tab" data-bs-toggle="tab" href="#mistakes"
                                   role="tab">Common Mistakes</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="documents-tab" data-bs-toggle="tab" href="#documents"
                                   role="tab">Help Documents</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="faqs-tab" data-bs-toggle="tab" href="#faqs" role="tab">FAQs</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="dependencies-tab" data-bs-toggle="tab" href="#dependencies" role="tab">Dependencies</a>
                            </li>
                        </ul>
                        <div class="tab-content mt-3">
                            <div class="tab-pane fade show active" id="mistakes" role="tabpanel">
                                <div  v-if="rlco_detail.foss?.length > 0">
                                    <ul v-for="(fos, index) in rlco_detail.foss">
                                        <li>{{ fos.fos_observation }} <span v-if="fos.fos_file"
                                        ><a
                                            :href="fos.fos_file"
                                            target="_blank"
                                            download
                                        ><font-awesome-icon
                                            icon="download" /></a
                                        ></span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="documents" role="tabpanel">
                                <div v-if="rlco_detail.other_documents?.length > 0">
                                    <ul v-for="(document, index) in rlco_detail.other_documents">
                                        <li>{{ document.document_title }} <span v-if="document.document_file"
                                        ><a
                                            target="_blank"
                                            :href="document.document_file"
                                            download
                                        ><font-awesome-icon
                                            icon="download" /></a
                                        ></span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="faqs" role="tabpanel">
                                <div v-if="rlco_detail.faqs?.length > 0">
                                    <a
                                        href="javascript:;"
                                        class="text-decoration-none btn-expend"
                                        @click.prevent="isExpand = false"
                                    >Collapse All</a
                                    >&nbsp;&nbsp;&nbsp;&nbsp;<a
                                    href="javascript:;"
                                    class="text-decoration-none btn-expend"
                                    @click.prevent="isExpand = true"
                                >Expand All</a
                                >
                                </div>
                                <div
                                    v-if="rlco_detail.faqs?.length > 0"
                                    class="accordion accordion-light accordion-light-borderless accordion-svg-toggle"
                                    id="accordionFaqs"
                                >
                                    <div
                                        v-for="(faq, index) in rlco_detail.faqs"
                                        class="accordion-item card bg-custom-color"
                                    >
                                        <div class="accordion-header" :id="`heading_faq_${index}`">
                                            <div
                                                class="accordion-button"
                                                :class="!isExpand ? 'collapsed' : ''"
                                                data-bs-toggle="collapse"
                                                :data-bs-target="`#collapse_faq_${index}`"
                                                :aria-expanded="isExpand ? true : false"
                                            >
                                                <span class="svg-icon svg-icon-primary">
                                    <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Navigation/Angle-double-right.svg-->
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px"
                                        height="24px"
                                        viewBox="0 0 24 24"
                                        version="1.1"
                                    >
                                        <g
                                            stroke="none"
                                            stroke-width="1"
                                            fill="none"
                                            fill-rule="evenodd"
                                        >
                                            <polygon
                                                points="0 0 24 0 24 24 0 24"
                                            ></polygon>
                                            <path
                                                d="M12.2928955,6.70710318 C11.9023712,6.31657888 11.9023712,5.68341391 12.2928955,5.29288961 C12.6834198,4.90236532 13.3165848,4.90236532 13.7071091,5.29288961 L19.7071091,11.2928896 C20.085688,11.6714686 20.0989336,12.281055 19.7371564,12.675721 L14.2371564,18.675721 C13.863964,19.08284 13.2313966,19.1103429 12.8242777,18.7371505 C12.4171587,18.3639581 12.3896557,17.7313908 12.7628481,17.3242718 L17.6158645,12.0300721 L12.2928955,6.70710318 Z"
                                                fill="#000000"
                                                fill-rule="nonzero"
                                            ></path>
                                            <path
                                                d="M3.70710678,15.7071068 C3.31658249,16.0976311 2.68341751,16.0976311 2.29289322,15.7071068 C1.90236893,15.3165825 1.90236893,14.6834175 2.29289322,14.2928932 L8.29289322,8.29289322 C8.67147216,7.91431428 9.28105859,7.90106866 9.67572463,8.26284586 L15.6757246,13.7628459 C16.0828436,14.1360383 16.1103465,14.7686056 15.7371541,15.1757246 C15.3639617,15.5828436 14.7313944,15.6103465 14.3242754,15.2371541 L9.03007575,10.3841378 L3.70710678,15.7071068 Z"
                                                fill="#000000"
                                                fill-rule="nonzero"
                                                opacity="0.3"
                                                transform="translate(9.000003, 11.999999) rotate(-270.000000) translate(-9.000003, -11.999999)"
                                            ></path>
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>
                                                <div class="card-label pl-4">
                                                    {{ faq.faq_question }}
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            :id="`collapse_faq_${index}`"
                                            class="collapse"
                                            :class="isExpand ? 'show' : ''"
                                            data-bs-parent="#accordionFaqs"
                                        >
                                            <div class="card-body pt-2 pb-0">
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
                            <div class="tab-pane fade" id="dependencies" role="tabpanel">
                                <div v-if="rlco_detail.dependencies?.length > 0">
                                    <ul v-for="(dependency, index) in rlco_detail.dependencies">
                                        <li>
                                <span>
                                    {{ dependency.activity_name }}
                                    <div style="font-size: 12px; margin-top: -5px">
                                        From
                                        {{ dependency.department?.department_name }}
                                    </div>
                                </span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
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
                        class="row detail-btn my-3 mb-2"
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
                        class="row feedback-div"
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
                        class="row mb-4 feedback-div"
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

                    <div v-show="isSubmitted" class="row mb-4 feedback-div">
                        <div class="col-lg-12 text-center">
                            Thank you for your feedback!
                        </div>
                    </div>
                </div>
            </div>
        </main>

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

<script>
import BaseModalComponent from "./BaseModalComponent";
import StarRating from "vue-star-rating";

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
            id: "printSection",
            popTitle: "Knowledge Hub",
            extraCss: process.env.MIX_BASE_URL + "/assets/print.css",
        },
        isExpand: false,
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

<style scoped></style>
