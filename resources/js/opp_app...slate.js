import "./bootstrap";
import Alpine from "alpinejs";
import "flowbite";
import { Drawer, Modal } from "flowbite";
import Glide, {
    Controls,
    Breakpoints,
} from "@glidejs/glide/dist/glide.modular.esm";
import $, { error, type } from "jquery";
import summernote from "summernote/dist/summernote-lite.min.js";
import DataTable from "datatables.net-dt";
import "datatables.net-dt/css/jquery.dataTables.min.css";
import "datatables.net-responsive-dt/css/responsive.dataTables.min.css";
import "datatables.net-buttons-dt/css/buttons.dataTables.min.css";
import "datatables.net-responsive-dt";
import AOS from "aos";
import "aos/dist/aos.css"; // You can also use <link> for styles
import Pusher from 'pusher-js';
window.Pusher = Pusher;

const pusher = new Pusher("e10c9431b073d54bd73a", {
    cluster: "ap1",
});
var channel = pusher.subscribe('opp-channel');
window.channel = channel;

import toastr from "toastr";
window.toastr = toastr;
window.toastr.options = {
    progressBar: true,
};

AOS.init({
    // Global settings:
    disable: false, // accepts following values: 'phone', 'tablet', 'mobile', boolean, expression or function
    startEvent: "DOMContentLoaded", // name of the event dispatched on the document, that AOS should initialize on
    initClassName: "aos-init", // class applied after initialization
    animatedClassName: "aos-animate", // class applied on animation
    useClassNames: false, // if true, will add content of `data-aos` as classes on scroll
    disableMutationObserver: false, // disables automatic mutations' detections (advanced)
    debounceDelay: 50, // the delay on debounce used while resizing window (advanced)
    throttleDelay: 99, // the delay on throttle used while scrolling the page (advanced)

    // Settings that can be overridden on per-element basis, by `data-aos-*` attributes:
    offset: 120, // offset (in px) from the original trigger point
    delay: 0, // values from 0 to 3000, with step 50ms
    duration: 400, // values from 0 to 3000, with step 50ms
    easing: "ease", // default easing for AOS animations
    once: false, // whether animation should happen only once - while scrolling down
    mirror: false, // whether elements should animate out while scrolling past them
    anchorPlacement: "top-bottom", // defines which position of the element regarding to window should trigger the animation
});



window.Alpine = Alpine;
Alpine.start();

// glide js initialization
const glide = document.getElementsByClassName("glide");

if (glide.length > 0) {
    new Glide(".glide").mount({ Controls, Breakpoints });
}

window.JQuery = window.$ = $;
import axios from "axios";

// Add DataTables and Buttons to the jQuery object:
$.DataTable = DataTable;
$.fn.DataTable = DataTable;
Object.assign(DataTable.defaults, {
    processing: true,
    serverSide: true,
    responsive: true,
    defaultContent: "",
    ajax: window.location.href,
    pagingType: "simple",
    dom: "rtip",
    aaSorting: [],
});

$(document).ready(function () {
    const paginate = $(document).find(".dataTables_paginate");
    const info = $(document).find(".dataTables_info");

    $(document).find("#paginate").html(paginate);
    $(document).find("#info").html(info);
});

$(document)
    .find("#dataTables_filter")
    .on("keyup copy paste cut", function () {
        $(document).find("#dataTable").dataTable().fnFilter(this.value);
    });

$(document)
    .find("#refreshTableButton")
    .on("click", function () {
        $("#dataTables_filter").val("");
        $(document).find("#dataTable").dataTable().fnFilter("");
    });

const $createEl = document.getElementById("drawer-create-default");
const $updateEl = document.getElementById("drawer-update-default");
const $deleteEl = document.getElementById("drawer-delete-default");
const $resumeEl = document.getElementById("resume-modal");
const $ratingEl = document.getElementById("rating-modal");
var deletepath = "";
var updatepath = "";

// options with default values
const modal_options = {
  placement: 'center',
  backdrop: 'dynamic',
  backdropClasses: 'bg-gray-900 bg-opacity-50 dark:bg-opacity-80 fixed inset-0 z-40',
  closable: true,
  onHide: () => {},
  onShow: () => {},
};
const rating_modal_options = {
    placement: "center",
    backdrop: "static",
    backdropClasses:
        "bg-gray-900 bg-opacity-50 dark:bg-opacity-80 fixed inset-0 z-40",
    closable: false,
    onHide: () => {},
    onShow: () => {},
};

const options = {
    placement: "right",
    backdrop: true,
    bodyScrolling: false,
    edge: false,
    edgeOffset: "",
    backdropClasses:
        "bg-gray-900 bg-opacity-50 dark:bg-opacity-80 fixed inset-0 z-30",
    onHide: () => {},
    onShow: (e) => {},
    onToggle: () => {
        console.log("drawer has been toggled");
    },
};

if ($createEl) {
    var createDrawer = new Drawer($createEl, options);
}

if ($updateEl) {
    var updateDrawer = new Drawer($updateEl, options);
}

if ($deleteEl) {
    var deleteDrawer = new Drawer($deleteEl, options);
}

if ($resumeEl) {
    var resumeModal = new Modal($resumeEl, modal_options);
}

if ($ratingEl) {
    var ratingModal = new Modal($ratingEl, rating_modal_options);
}

const createForm = document.querySelector(".create-form");
const updateForm = document.querySelector('.update-form');

function openCreateDrawer() {
    createDrawer.show();
}

function hideCreateDrawer() {
    createForm.reset();
    $(createForm).find("span").html("");
    createDrawer.hide();
}

if (createForm != undefined && createForm) {
    createForm.addEventListener("submit", function (e) {
        e.preventDefault();
        $(this).find("span").html("");

        let formData = new FormData($(this)[0]);
        axios
            .post(this.action, formData, {
                headers: { "Content-Type": "multipart/form-data" },
            })
            .then(function (res) {
                if (res.data.success) {
                    $(document).find("#dataTable").dataTable().fnFilter("");
                    hideCreateDrawer();
                }
            })
            .catch((error) => {
                let errors = error.response.data.errors;
                for (const key in errors) {
                    $(this)
                        .find(
                            "input[name=" +
                                key +
                                "],select[name=" +
                                key +
                                "],textarea[name=" +
                                key +
                                "]"
                        )
                        .next("span")
                        .html(errors[key][0]);
                }
            });
    });
}

function openUpdateDrawer(el) {
    updatepath = el.dataset.href;
    let data = JSON.parse(el.dataset.query);
    let inputs = updateForm.querySelectorAll(
        "input:not(:disabled):not([type=file]):not([readonly]):not([type=hidden])" +
            ",select:not(:disabled):not([readonly])" +
            ",textarea:not(:disabled):not([readonly])"
    );

    inputs.forEach((element) => {
        if (element.name in data) {
            if (element.classList.contains("summernote")) {
                $(".summernote").summernote("code", data[element.name]);
            } else {
                element.value = data[element.name];
            }
        }
    });

    updateDrawer.show();
}

function hideUpdateDrawer() {
    updateForm.reset();
    $(updateForm).find("span").html("");
    updatepath = "";
    updateDrawer.hide();
}

if (updateForm != undefined && updateForm) {
    updateForm.addEventListener("submit", function (e) {
        e.preventDefault();
        $(this).find("span").html("");

        if (updatepath != "" && updatepath != undefined) {
            let formData = new FormData($(this)[0]);
            axios
                .post(updatepath, formData, {
                    params: {
                        '_method': 'PUT'
                    },
                    headers: { "Content-Type": "multipart/form-data" },
                })
                .then(function (res) {
                    if (res.data.success) {
                        $(document).find("#dataTable").dataTable().fnFilter("");
                        hideUpdateDrawer();
                    }
                })
                .catch((error) => {
                    let errors = error.response.data.errors;
                    for (const key in errors) {
                        $(this)
                            .find(
                                "input[name=" +
                                    key +
                                    "],select[name=" +
                                    key +
                                    "],textarea[name=" +
                                    key +
                                    "]"
                            )
                            .next("span")
                            .html(errors[key][0]);
                    }
                });
        }
    });
}

function openDeleteDrawer(el) {
    deletepath = el.dataset.href;
    let res = $(document).find('.delete-message');
    if (!res.hasClass('hidden')) {
        res.addClass("hidden");
    }
    res.find("span").html("");
    deleteDrawer.show();
}

function hideDeleteDrawer() {
    deletepath = "";
    deleteDrawer.hide();
}

function deleteItem() {
    if (deletepath != "" && updatepath != undefined) {
        axios
            .delete(deletepath)
            .then(function (res) {
                if (res.data.success) {
                    $(document).find("#dataTable").dataTable().fnFilter("");
                    hideDeleteDrawer();
                }
            })
            .catch((error) => {
                let res = $(document).find(".delete-message");
                res.removeClass('hidden');
                res.find("span").html(error.response.data.error);
                hideDeleteDrawer();
            });
    }
}

function openResumeModal(el) {
    let data = el.dataset.query;
    $("#resume-modal").find(".messages").html(data);
    resumeModal.show();
}

function hideResumeModal() {
    resumeModal.hide();
}

function openRatingModal() {
    ratingModal.show();
}

function sendChatMessage(form, url) {
    let formData = new FormData($(form)[0]);
    let msgBox = document.querySelector(".message-box");

    axios
        .post(url, formData)
        .then(function (res) {
            let data = res.data.data;

            var html = `<div class="flex justify-end mb-2">
                            <div class="rounded py-2 px-3" style="background-color: #E2F7CB">
                                <p class="text-sm mt-1">
                                    ${data.message}
                                </p>
                                <p class="text-right text-xs text-grey-dark mt-1">
                                    ${formatAMPM(new Date(data.created_at))}
                                </p>
                            </div>
                        </div>`;

            $(msgBox).append(html);
            $("#sendMessage_btn").attr("disabled", false);
        })
        .catch(function (err) {
            console.log(err);
        });
}

function addToWishList(el) {
    axios.post(el.dataset.route, {
        'status': el.dataset.tag,
        'job_id': el.dataset.job,
        'user_id': el.dataset.id,
    }).then(function (res) {
        if (res.data.status) {
            if (res.data.data == true) {
                el.dataset.tag = 'true';
                $(el).find("svg g:last-child path").addClass("fill-blue-800");

                toastr.success("Successfully Saved to Wish List!");
            } else {
                el.dataset.tag = "false";
                $(el)
                    .find("svg g:last-child path")
                    .removeClass("fill-blue-800");

                toastr.success("Successfully Removed from Wish List!");
            }
        }
    }).catch((error) => {
        toastr.error(error.response.data.message);
    });
}

function formatAMPM(date) {
    var hours = date.getHours();
    var minutes = date.getMinutes();
    var ampm = hours >= 12 ? "PM" : "AM";
    hours = hours % 12;
    hours = hours ? hours : 12; // the hour '0' should be '12'
    minutes = minutes < 10 ? "0" + minutes : minutes;
    var strTime = hours + ":" + minutes + " " + ampm;
    return strTime;
}

window.openCreateDrawer = openCreateDrawer;
window.openUpdateDrawer = openUpdateDrawer;
window.openDeleteDrawer = openDeleteDrawer;

window.hideCreateDrawer = hideCreateDrawer;
window.hideUpdateDrawer = hideUpdateDrawer;
window.hideDeleteDrawer = hideDeleteDrawer;

window.deleteItem = deleteItem;
window.sendChatMessage = sendChatMessage;
window.addToWishList = addToWishList;
window.formatAMPM = formatAMPM;
window.openResumeModal = openResumeModal;
window.hideResumeModal = hideResumeModal;
window.openRatingModal = openRatingModal;

