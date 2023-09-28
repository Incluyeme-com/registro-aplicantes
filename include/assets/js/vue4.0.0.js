Vue.config.ignoredElements = ["x-incluyeme", "fb:login-button"];
Vue.component("step1", {
    template: "#step1",
    props: ["currentStep", "step1"],
});
Vue.component("step2", {
    template: "#step2",
    props: ["currentStep", "step2"],
});
Vue.component("step3", {
    template: "#step3",
    props: ["currentStep", "step1", "step2"],
});
Vue.component("step4", {
    template: "#step4",
    props: ["currentStep", "step1", "step2"],
});
Vue.component("step5", {
    template: "#step5",
    props: ["currentStep", "step1", "step2"],
});
Vue.component("step6", {
    template: "#step6",
    props: ["currentStep", "step1", "step2"],
});
Vue.component("step7", {
    template: "#step7",
    props: ["currentStep", "step1", "step2"],
});
Vue.component("step8", {
    template: "#step8",
    props: ["currentStep", "step1", "step2"],
});
Vue.component("step9", {
    template: "#step9",
    props: ["currentStep", "step1", "step2"],
});
Vue.component("step10", {
    template: "#step10",
    props: ["currentStep", "step1", "step2"],
});
Vue.component("step11", {
    template: "#step11",
    props: ["currentStep", "step1", "step2"],
});
Vue.component("step12", {
    template: "#step12",
    props: ["currentStep", "step1", "step2"],
});
Vue.component("step13", {
    template: "#step13",
    props: ["currentStep", "step1", "step2"],
});
let app = new Vue({
    el: "#incluyeme-login-wpjb",
    data: {
        userID: null,
        dateStudiesDLaboral: [],
        dateStudiesHLaboral: [],
        url: null,
        countries: [],
        universities: [],
        passwordConfirm: null,
        genre: null,
        livingZone: null,
        name: null,
        cities: [],
        email: null,
        password: null,
        street: "No aplica",
        lastName: null,
        formFields3: [],
        dateBirthDay: null,
        disCap: null,
        idioms: null,
        levels: null,
        university_otro: [],
        disClass: "w-100",
        mPhone: null,
        country: null,
        dateStudiesD: [],
        dateStudieB: [],
        titleEdu: [],
        preferJob: [],
        preferJobs: null,
        eduLevel: [],
        formFields: [],
        phone: null,
        jobs: [],
        levelExperience: [],
        actuWork: [],
        fPhone: null,
        fiPhone: null,
        mPie: null,
        mSen: null,
        mEsca: null,
        mBrazo: null,
        peso: null,
        showTextInputCity: false,
        showTextInputState: false,
        mRueda: null,
        mBrazo: null,
        desplazarte: null,
        mDigi: null,
        vHumedos: null,
        vTemp: null,
        vPolvo: null,
        aFluida: null,
        vCompleta: null,
        vAdap: null,
        aAmbient: null,
        aOral: null,
        aSennas: null,
        aLabial: null,
        aBajo: null,
        aImplante: null,
        vLejos: null,
        jobsDescript: [],
        vObserlet: null,
        vTemp: null,
        universities: [],
        vColores: null,
        vDPlanos: null,
        vTecniA: null,
        formFields2: [],
        areaEmployed: [],
        inteEscri: null,
        inteTransla: null,
        inteTarea: null,
        inteActividad: null,
        inteMolesto: null,
        employed: [],
        inteTrabajar: null,
        inteTrabajarSolo: null,
        moreDis: null,
        psiquica: false,
        habla: false,
        intelectual: false,
        visceral: false,
        visual: false,
        vObservar: null,
        city: null,
        experiences: null,
        auditiva: false,
        motriz: false,
        image: null,
        country_nac: null,
        img: null,
        dateStudiesH: [],
        reader: null,
        cv: null,
        validation: false,
        cvSHOW: null,
        cvReader: null,
        cud: null,
        cudSHOW: null,
        cudReader: null,
        workingSearch: null,
        workingNow: null,
        state: null,
        edu_levelMaxSec: null,
        currentStep: 1,
        cudOption: null,
        country_edu: [],
        edu_levelMax: [
            "Primaria / Enseñanza básica incompleta",
            "Primaria / Enseñanza básica completa",
            "Secundario / Enseñanza media incompleta",
            "Secundario / Enseñanza media completa",
            "Universitario incompleto",
            "Universitario en curso",
            "Universitario completo",
            "Tecnicatura incompleta",
            "Tecnicatura en curso",
            "Tecnicatura completa",
            "Especialización incompleta",
            "Especialización en curso",
            "Especialización completa",
        ],
        meetingIncluyemeOptions: [
            "Lo encontré en Google buscando oportunidades para personas con discapacidad.",
            "Ya conocía Incluyeme.com y lo leí en su página.",
            "Recibí comunicaciones por parte de Incluyeme.com.",
            "Me apareció en una publicidad.",
            "Lo vi en una publicación de redes sociales.",
            "Lo leí en una nota de prensa.",
            "Me lo recomendaron.",
        ],
        university_edu: [],
        studies: [],
        study: [],
        idioms: [],
        idiom: [],
        lecLevel: [],
        redLevel: [],
        oralLevel: [],
        idiomsOther: [],
        awaitChange: false,
        google: false,
        facebook: false,
        provincias: [],
        inteTrabajarOP: null,
        noDisPage: false,
        meetingIncluyeme: null,
        defaultCheckDiscapacidad: false,
        defaultCheckTerminos: false,
    },
    ready: function () {
        console.log("ready");
    },
    mounted() {
        this.formFields2.push(1);
        this.formFields3.push(1);
        this.noDisPage = false;
    },
    methods: {
        goToStep: async function (step, url = false) {
            if (this.currentStep === 13) {
                return;
            }
            this.url = url;
            if (this.awaitChange === true) {
                return;
            }
            switch (Number(step)) {
                case 2:
                    this.awaitChange = true;
                    if (
                        (await this.confirmStep2(step)) === true &&
                        this.currentStep <= 2
                    ) {
                        this.getLevelsIdioms().finally();
                        this.getIdioms().finally();
                        this.getCountries().finally();
                        this.getStudies().finally();
                        this.getExperiences().finally();
                        this.getPrefersJobs().finally();
                        this.getProvincias().finally();
                        this.currentStep = step;
                        this.goToTop();
                    }
                    this.goToTop();
                    break;
                case 3:
                    if (this.currentStep <= 3) {
                        this.awaitChange = true;
                        await this.confirmStep3(step);
                    } else {
                        this.currentStep = step;
                        this.goToTop();
                    }
                    this.goToTop();
                    break;
                case 4:
                    if (this.currentStep <= 4) {
                        this.awaitChange = true;
                        await this.confirmStep4(step);
                    } else {
                        this.currentStep = step;
                        this.goToTop();
                    }
                    this.goToTop();
                    break;
                case 5:
                    if (this.currentStep <= 5) {
                        this.awaitChange = true;
                        await this.confirmStep5(step);
                    } else {
                        this.currentStep = step;
                        this.goToTop();
                    }
                    this.goToTop();
                    break;
                case 6:
                    await this.confirmStep6(step);
                    this.goToTop();

                    break;
                case 7:
                    if (this.currentStep <= 7) {
                        this.awaitChange = true;
                        await this.confirmStep7(step);
                    } else {
                        this.currentStep = step;
                    }

                    this.goToTop();

                    break;
                case 8:
                    if (this.currentStep <= 8) {
                        this.awaitChange = true;
                        await this.confirmStep8(step);
                    } else {
                        this.currentStep = step;
                    }

                    this.goToTop();
                    break;
                case 9:
                    if (this.currentStep <= 9) {
                        this.awaitChange = true;
                        await this.confirmStep9(step);
                    } else {
                        this.currentStep = step;
                    }

                    this.goToTop();
                    break;
                case 10:
                    if (this.currentStep <= 10) {
                        this.awaitChange = true;
                        await this.confirmStep10(step);
                    } else {
                        this.currentStep = step;
                    }

                    this.goToTop();
                    break;
                case 11:
                    if (this.currentStep <= 11) {
                        this.awaitChange = true;
                        await this.confirmStep11(step);
                    } else {
                        this.currentStep = step;
                    }

                    this.goToTop();
                    break;
                case 12:
                    if (this.currentStep <= 12) {
                        this.awaitChange = true;
                        await this.confirmStep12(step);
                    } else {
                        this.currentStep = step;
                    }

                    this.goToTop();
                    break;
                case 13:
                    if (this.currentStep <= 13) {
                        this.awaitChange = true;
                        await this.confirmStep13(step);
                    } else {
                        this.currentStep = step;
                    }

                    this.goToTop();
                    break;
                default:
                    console.log("default");
                    this.currentStep = step;

                    this.goToTop();
            }
        },
        drop: async function () {
            this.currentStep = 7;
        },
        dropzone: async function () {
            const url =
                this.url +
                "/incluyeme-login-extension/include/verifications/register.php";
            const id = this.userID;
            jQuery("#demo-upload").dropzone({
                init: function () {
                    const dropzone = this;
                    clearDropzone = function () {
                        dropzone.removeAllFiles(true);
                    };
                },
                url: url,
                maxFiles: 1,
                acceptedFiles: "image/jpg, image/png, image/jpeg",
                addRemoveLinks: true,
                dictInvalidFileType:
                    "El tipo de archivo que ha subido no es valido, aceptamos imagenes en formato .jpg, .png, .jpeg",
                dictFileTooBig: "Su archivo no puede pesar mas de 5MB",
                sending: function (file, xhr, formData) {
                    formData.append("userID", id);
                },
                dictMaxFilesExceeded:
                    "Solo puede subir un archivo, por favor, elimine su archivo anterior",
                paramName: "img_path",
                maxFilesize: 5,
                dictCancelUpload: "Cancelar",
                dictRemoveFile: "Eliminar",
                removedfile: function (file) {
                    let x = true;
                    if (!x) return false;
                    jQuery.ajax({
                        type: "POST",
                        url: url,
                        data: {
                            userID: id,
                            removeIMG: "remove",
                        },
                        dataType: "json",
                    });
                    let _ref;
                    this.removeAllFiles(true);
                    return (_ref = file.previewElement) != null
                        ? _ref.parentNode.removeChild(file.previewElement)
                        : void 0;
                },
            });
            jQuery("#CVDROP").dropzone({
                url: url,
                maxFiles: 1,
                acceptedFiles: ".pdf,.png,.jpg,.jpeg,.doc,.docx",
                addRemoveLinks: true,
                dictInvalidFileType:
                    "El tipo de archivo que ha subido no es valido, aceptamos imagenes en formato .jpg, .png, .jpeg",
                dictFileTooBig: "Su archivo no puede pesar mas de 5MB",
                sending: function (file, xhr, formData) {
                    formData.append("userID", id);
                },
                dictMaxFilesExceeded:
                    "Solo puede subir un archivo, por favor, elimine su archivo anterior",
                paramName: "cv",
                maxFilesize: 5,
                dictCancelUpload: "Cancelar",
                dictRemoveFile: "Eliminar",
                removedfile: function (file) {
                    let x = true;
                    if (!x) return false;
                    jQuery.ajax({
                        type: "POST",
                        url: url,
                        data: {
                            userID: id,
                            RemoveCV: "remove",
                        },
                        dataType: "json",
                    });
                    let _ref;
                    this.removeAllFiles(true);
                    return (_ref = file.previewElement) != null
                        ? _ref.parentNode.removeChild(file.previewElement)
                        : void 0;
                },
            });
            jQuery("#CUDDROP").dropzone({
                url: url,
                maxFiles: 1,
                acceptedFiles: ".pdf,.png,.jpg,.jpeg,.doc,.docx",
                addRemoveLinks: true,
                dictInvalidFileType:
                    "El tipo de archivo que ha subido no es valido, aceptamos archivos en formato .PDF, .PNG, .JPG, Word",
                dictFileTooBig: "Su archivo no puede pesar mas de 5MB",
                sending: function (file, xhr, formData) {
                    formData.append("userID", id);
                },
                dictMaxFilesExceeded:
                    "Solo puede subir un archivo, por favor, elimine su archivo anterior",
                paramName: "cud",
                maxFilesize: 5,
                dictCancelUpload: "Cancelar",
                dictRemoveFile: "Eliminar",
                removedfile: function (file) {
                    let x = true;
                    if (!x) return false;
                    jQuery.ajax({
                        type: "POST",
                        url: url,
                        data: {
                            userID: id,
                            removeCUD: "remove",
                        },
                        dataType: "json",
                    });
                    let _ref;
                    this.removeAllFiles(true);
                    return (_ref = file.previewElement) != null
                        ? _ref.parentNode.removeChild(file.previewElement)
                        : void 0;
                },
            });
        },
        isValidEmail: async function (email) {
            const re =
                /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(email);
        },
        confirmStep2: async function (step) {
            let confirmEmail = await this.isValidEmail(this.email);
            if (!confirmEmail || this.password === null || !this.password) {
                this.validation = 2;
                this.awaitChange = false;
                jQuery("#emil").css("border-color", "#A90000");
                jQuery("#inputPassword4").removeAttr("style");
                jQuery("#repostP").removeAttr("style");
                return false;
            } else if (this.password === null || !this.password) {
                this.validation = 3;
                jQuery("#inputPassword4").css("border-color", "#A90000");
                jQuery("#emil").removeAttr("style");
                return false;
            } else if (this.password.length < 5) {
                this.validation = 3;
                jQuery("#inputPassword4").css("border-color", "#A90000");
                this.awaitChange = false;
                return false;
            } else if (this.password !== this.passwordConfirm) {
                this.validation = 4;
                jQuery("#repostP").css("border-color", "#A90000");
                jQuery("#inputPassword4").removeAttr("style");
                jQuery("#emil").removeAttr("style");
                this.awaitChange = false;
                return false;
            } else if (!this.defaultCheckDiscapacidad) {
                jQuery("#repostP").removeAttr("style");
                jQuery("#inputPassword4").removeAttr("style");
                jQuery("#emil").removeAttr("style");
                this.validation = "discapacidadTerms";
                this.awaitChange = false;
                return false;
            } /*else if (!this.defaultCheckTerminos) {
                jQuery("#repostP").removeAttr("style");
                jQuery("#repostPLabel").removeAttr("style");
                jQuery("#inputPassword4").removeAttr("style");
                jQuery("#labelPassword4").removeAttr("style");
                jQuery("#emil").removeAttr("style");
                jQuery("#emilLabel").removeAttr("style");
                jQuery("#defaultCheckTerminosLabel").css('color', "red");
                jQuery("#defaultCheckDiscapacidadLabel").css('color', "black");
                this.validation = 'terms';
                this.awaitChange = false;
                return false;
            }*/
            this.pleaseAwait();
            let verifications = await axios
                .post(
                    this.url +
                    "/incluyeme-login-extension/include/verifications/register.php",
                    {
                        email: this.email,
                        password: this.password,
                    }
                )
                .then(function (response) {
                    return response;
                })
                .catch(function (error) {
                    return true;
                });
            if (verifications.data.message === true) {
                this.validation = 1;
                jQuery("#repostP").removeAttr("style");
                jQuery("#inputPassword4").removeAttr("style");
                jQuery("#emil").css("border-color", "red");
                jQuery("#defaultCheckDiscapacidadLabel").css("color", "black");
                this.awaitChange = false;
                return false;
            } else if (verifications.data.message === false) {
                this.awaitChange = false;
                this.currentStep = step;
            }
            this.awaitChange = false;
            return true;
        },
        googleChange: async function (url, verification = true) {
            this.url = url;
            const data = {
                email: this.email,
                password: this.password,
                name: this.name,
                lastName: this.lastName,
            };
            if (this.google) {
                data.google = this.google;
                data.facebook = false;
            } else if (this.facebook) {
                data.facebook = this.facebook;
                data.google = false;
            } else {
                return false;
            }
            let verifications = await jQuery
                .ajax({
                    url:
                        this.url +
                        "/incluyeme-login-extension/include/verifications/register.php",
                    type: "POST",
                    data: data,
                })
                .done(function (response, status, xhr) {
                    var ct = xhr.getResponseHeader("content-type") || "";
                    if (ct.indexOf("html") > -1) {
                        window.location.href = "/trabajos";
                    }
                    return response;
                });

            this.awaitChange = false;
            this.userID = verifications.message;
            this.currentStep = 3;
            data.googleID = verifications.message;
            await jQuery
                .ajax({
                    url:
                        this.url +
                        "/incluyeme-login-extension/include/verifications/register.php",
                    type: "POST",
                    data: data,
                })
                .done(function (response, status, xhr) {
                    return response;
                });
            this.getLevelsIdioms().finally();
            this.getIdioms().finally();
            this.getCountries().finally();
            this.getStudies().finally();
            this.getExperiences().finally();
            this.getPrefersJobs().finally();
            this.getProvincias().finally();
            return true;
        },
        confirmStep3: async function (step) {
            if (!this.name) {
                this.validation = 5;
                jQuery("#names").css("border-color", "#A90000");
                jQuery("#lastNames").removeAttr("style");
                this.awaitChange = false;
                return false;
            } else if (!this.lastName) {
                this.validation = 6;
                jQuery("#lastNames").css("border-color", "#A90000");
                jQuery("#names").removeAttr("style");
                this.awaitChange = false;
                return false;
            } else if (this.disCap == null) {
                this.validation = 20;
                jQuery("#names").removeAttr("style");
                this.awaitChange = false;
                return false;
            }
            this.pleaseAwait();
            let verifications = await axios
                .post(
                    this.url +
                    "/incluyeme-login-extension/include/verifications/register.php",
                    {
                        email: this.email,
                        password: this.password,
                        name: this.name,
                        lastName: this.lastName,
                        haveDiscap: this.disCap === false ? "noDIS" : "siDIS",
                    }
                )
                .then(function (response) {
                    return response;
                })
                .catch(function (error) {
                    return true;
                });
            this.userID = verifications.data.message;
            this.awaitChange = false;
            if (this.disCap === false) {
                this.noDisPage = true;
                this.goToTop();
                return false;
            }
            this.currentStep = step;
            this.goToTop();
            this.renderPickers();
        },
        confirmStep4: async function (step) {
            if (!this.genre) {
                this.validation = 7;
                jQuery("#dateBirthDay").removeAttr("style");
                this.awaitChange = false;
                return;
            } else if (!this.dateBirthDay) {
                this.validation = 8;
                jQuery("#dateBirthDay").css("border-color", "#A90000");
                this.awaitChange = false;
                return;
            }
            if (!this.country_nac) {
                this.validation = 30;
                jQuery("#country_nac ~ button").css("border-color", "#A90000");
                this.awaitChange = false;
                return;
            }
            if (this.disCap === false && (this.google || this.facebook)) {
                this.noDisPage = true;
                this.goToTop();
                return false;
            }
            this.awaitChange = false;
            this.currentStep = step;
            this.goToTop();
            this.renderPickers();
        },
        confirmStep5: async function (step) {
            let inputMPhone = jQuery("#mPhone");
            let inputPhone = jQuery("#phone");
            let inputRegion = jQuery("#state ~ button");
            let inputCity = jQuery("#city ~ button");
            if (!this.mPhone) {
                this.validation = 9;
                inputMPhone.css("border-color", "#A90000");
                this.awaitChange = false;
                return;
            }
            if (!this.phone) {
                this.validation = 20;
                inputPhone.css("border-color", "#A90000");
                inputMPhone.removeAttr("style");
                this.awaitChange = false;
                return;
            }
            if (!this.state) {
                this.validation = 10;
                inputRegion.css("border-color", "#A90000");
                inputPhone.removeAttr("style");
                this.awaitChange = false;
                return;
            }
            if (!this.city) {
                this.validation = 11;
                inputCity.css("border-color", "#A90000");
                inputRegion.removeAttr("style");
                this.awaitChange = false;
                return;
            }
            if (!this.livingZone) {
                this.validation = 25;
                inputCity.removeAttr("style");
                this.awaitChange = false;
                return;
            }
            this.pleaseAwait();
            let verification = await axios
                .post(
                    this.url +
                    "/incluyeme-login-extension/include/verifications/register.php",
                    {
                        mPhone: this.mPhone,
                        state: this.state,
                        city: this.city,
                        fPhone: this.fPhone,
                        fiPhone: this.fiPhone,
                        street: this.street,
                        genre: this.genre,
                        dateBirthDay: this.dateBirthDay,
                        userID: this.userID,
                        phone: this.phone,
                        country_nac: this.country_nac,
                    }
                )
                .then(function (response) {
                    return response;
                })
                .catch(function (error) {
                    return true;
                });
            this.userID = verification.data.message;
            this.awaitChange = false;
            this.currentStep = step;
            this.goToTop();
        },
        confirmStep7: async function (step) {
            let disCText = jQuery("#disCText");
            if (!this.moreDis) {
                this.validation = 11;
                jQuery("#exampleFormControlTextarea1").css("border-color", "#A90000");
                this.awaitChange = false;
                return;
            }
            this.pleaseAwait();
            const data = {
                moreDis: this.moreDis,
                userID: this.userID,
                discaps: [],
            };
            if (this.motriz) {
                data.discaps.push(1);
                data.motriz = 1;
                data.mPie = this.mPie;
                data.mSen = this.mSen;
                data.mEsca = this.mEsca;
                data.mBrazo = this.mBrazo;
                data.peso = this.peso;
                data.mRueda = this.mRueda;
                data.desplazarte = this.desplazarte;
                data.mDigi = this.mDigi;
            }
            if (this.auditiva) {
                data.discaps.push(2);
                data.auditiva = 2;
                data.aAmbient = this.aAmbient;
                data.aSennas = this.aSennas;
                data.aLabial = this.aLabial;
                data.aBajo = this.aBajo;
                data.aImplante = this.aImplante;
                data.aOral = this.aOral;
                data.aFluida = this.aFluida;
            }
            if (this.visual) {
                data.discaps.push(3);
                data.visual = 3;
                data.vLejos = this.vLejos;
                data.vObservar = this.vObservar;
                data.vColores = this.vColores;
                data.vDPlanos = this.vDPlanos;
                data.vTecniA = this.vTecniA;
            }
            if (this.visceral) {
                data.discaps.push(4);
                data.visceral = 4;
                data.vHumedos = this.vHumedos;
                data.vTemp = this.vTemp;
                data.vPolvo = this.vPolvo;
                data.vCompleta = this.vCompleta;
                data.vAdap = this.vAdap;
            }
            if (this.intelectual) {
                data.discaps.push(5);
                data.intelectual = 5;
                data.inteEscri = this.inteEscri;
                data.inteTransla = this.inteTransla;
                data.inteTarea = this.inteTarea;
                data.inteActividad = this.inteActividad;
                data.inteMolesto = this.inteMolesto;
                data.inteTrabajar = this.inteTrabajar;
                data.inteTrabajarSolo = this.inteTrabajarSolo;
                data.inteTrabajarOP = this.inteTrabajarOP;
            }
            if (this.psiquica) {
                data.discaps.push(6);
                data.psiquica = 6;
            }
            if (this.habla) {
                data.discaps.push(7);
                data.habla = 7;
            }
            await axios
                .post(
                    this.url +
                    "/incluyeme-login-extension/include/verifications/register.php",
                    data
                )
                .then(function (response) {
                    return response;
                })
                .catch(function (error) {
                    return true;
                });
            this.currentStep = step;
            await this.drop();
            this.dropzone();
            this.awaitChange = false;
            this.goToTop();
        },
        confirmStep8: async function (step) {
            if (!this.cudOption) {
                this.validation = 29;
                jQuery("#OptionCVLabel").css("border-color", "#A90000");
                this.awaitChange = false;
                return;
            }
            this.awaitChange = false;
            this.currentStep = step;
            this.goToTop();
        },
        confirmStep9: async function (step) {
            this.pleaseAwait();
            let edu_levelMaxText = jQuery("#edu_levelMaxText");
            if (!this.edu_levelMaxSec) {
                this.validation = 26;
                jQuery("#edu_levelMax ~ button").css("border-color", "#A90000");
                this.awaitChange = false;
                return;
            }
            await axios
                .post(
                    this.url +
                    "/incluyeme-login-extension/include/verifications/register.php",
                    {
                        userID: this.userID,
                        country_edu: this.country_edu,
                        university_edu: this.university_edu,
                        university_otro: this.university_otro,
                        studies: this.studies,
                        titleEdu: this.titleEdu,
                        eduLevel: this.eduLevel,
                        dateStudiesD: this.dateStudiesD,
                        dateStudiesH: this.dateStudiesH,
                        dateStudieB: this.dateStudieB,
                        edu_levelMaxSec: this.edu_levelMaxSec,
                        cudOption: this.cudOption,
                    }
                )
                .then(function (response) {
                    return response;
                })
                .catch(function (error) {
                    return true;
                });
            this.awaitChange = false;
            this.currentStep = step;
            this.goToTop();
        },
        confirmStep10: async function (step) {
            this.pleaseAwait();
            await axios
                .post(
                    this.url +
                    "/incluyeme-login-extension/include/verifications/register.php",
                    {
                        userID: this.userID,
                        employed: this.employed,
                        areaEmployed: this.areaEmployed,
                        jobs: this.jobs,
                        levelExperience: this.levelExperience,
                        actuWork: this.actuWork,
                        dateStudiesDLaboral: this.dateStudiesDLaboral,
                        dateStudiesHLaboral: this.dateStudiesHLaboral,
                        jobsDescript: this.jobsDescript,
                    }
                )
                .then(function (response) {
                    return response;
                })
                .catch(function (error) {
                    return true;
                });
            this.awaitChange = false;
            this.currentStep = step;
            this.goToTop();
        },
        confirmStep11: async function (step) {
            this.pleaseAwait();
            await axios
                .post(
                    this.url +
                    "/incluyeme-login-extension/include/verifications/register.php",
                    {
                        userID: this.userID,
                        idioms: this.idioms,
                        oLevel: this.oralLevel,
                        wLevel: this.redLevel,
                        sLevel: this.lecLevel,
                        idiomsOther: this.idiomsOther,
                    }
                )
                .then(function (response) {
                    return response;
                })
                .catch(function (error) {
                    return true;
                });
            this.awaitChange = false;
            this.currentStep = step;
            this.goToTop();
        },
        confirmStep12: async function (step) {
            if (!this.workingNow) {
                this.validation = 27;
                this.awaitChange = false;
                return;
            }
            if (!this.workingSearch) {
                this.validation = 28;
                this.awaitChange = false;
                return;
            }
            this.pleaseAwait();
            await axios
                .post(
                    this.url +
                    "/incluyeme-login-extension/include/verifications/register.php",
                    {
                        userID: this.userID,
                        preferJobs: this.preferJobs,
                        workingNow: this.workingNow,
                        workingSearch: this.workingSearch,
                    }
                )
                .then(function (response) {
                    return response;
                })
                .catch(function (error) {
                    return true;
                });

            this.awaitChange = false;
            this.currentStep = step;
            this.goToTop();
        },
        confirmStep13: async function (step) {
            let meeetIncluyeme = jQuery("#meetingIncluyeme");
            if (!this.meetingIncluyeme) {
                this.validation = 29;
                meeetIncluyeme.css("border-color", "#A90000");
                this.awaitChange = false;
                return;
            }
            this.pleaseAwait();
            await axios
                .post(
                    this.url +
                    "/incluyeme-login-extension/include/verifications/register.php",
                    {
                        userID: this.userID,
                        meetingIncluyeme: this.meetingIncluyeme,
                    }
                )
                .then(function (response) {
                    return response;
                })
                .catch(function (error) {
                    return true;
                });

            this.awaitChange = false;
            this.currentStep = step;
            window.location.href = "/thank-you";
        },
        getUniversities: async function (id) {
            let universities = await this.getUniver(id);
            this.universities[id] = universities.data.message;
            Vue.set(app.universities, id, universities.data.message);
            if (universities.data.message.length !== 0) {
                this.university_edu[id] = universities.data.message[0].university;
            } else {
                this.university_edu[id] = null;
            }
        },
        changeUniversity: function (id, changes) {
            if (changes === true) {
                Vue.set(app.university_otro, id, false);
            } else {
                Vue.set(app.university_edu, id, false);
            }
        },
        getUniver: async function (id) {
            return axios
                .get(
                    this.url +
                    "/incluyeme-login-extension/include/search/countries.php?countries=" +
                    this.country_edu[id],
                    {}
                )
                .then(function (response) {
                    return response;
                })
                .catch(function (error) {
                    console.log(error);
                });
        },
        getCities: async function (id) {
            let cities = await jQuery
                .ajax({
                    url:
                        this.url +
                        "/incluyeme-login-extension/include/search/countries.php?city=" +
                        this.state,
                    type: "GET",
                    dataType: "json",
                })
                .done((success) => {
                    return success;
                });
            this.cities = cities.message;
        },
        getCountries: async function (url) {
            let countries = await jQuery
                .ajax({
                    url:
                        this.url +
                        "/incluyeme-login-extension/include/search/countries.php?countries=all",
                    type: "GET",
                    dataType: "json",
                })
                .done((success) => {
                    return success;
                });
            this.countries = countries.message;
        },
        getStudies: async function (url) {
            this.formFields.push(1);
            let studies = await jQuery
                .ajax({
                    url:
                        this.url +
                        "/incluyeme-login-extension/include/search/studies.php?studies=all",
                    type: "GET",
                    dataType: "json",
                })
                .done((success) => {
                    return success;
                });
            this.study = studies.message;
        },
        getExperiences: async function (url) {
            let experiences = await jQuery
                .ajax({
                    url:
                        this.url +
                        "/incluyeme-login-extension/include/search/experiencesAreas.php?experiences=all",
                    type: "GET",
                    dataType: "json",
                })
                .done((success) => {
                    return success;
                });
            this.experiences = experiences.message;
        },
        getPrefersJobs: async function (url) {
            let preferJob = await jQuery
                .ajax({
                    url:
                        this.url +
                        "/incluyeme-login-extension/include/search/prefersJobs.php?experiences=all",
                    type: "GET",
                    dataType: "json",
                })
                .done((success) => {
                    return success;
                });
            this.preferJob = preferJob.message;
        },
        getProvincias: async function (url) {
            let provincias = await jQuery
                .ajax({
                    url:
                        this.url +
                        "/incluyeme-login-extension/include/search/countries.php?provincias=CVC",
                    type: "GET",
                    dataType: "json",
                })
                .done((success) => {
                    return success;
                });
            this.provincias = provincias.message;
        },
        getLevelsIdioms: async function (url) {
            let levels = await jQuery
                .ajax({
                    url:
                        this.url +
                        "/incluyeme-login-extension/include/search/idioms.php?levels=all",
                    type: "GET",
                    dataType: "json",
                })
                .done((success) => {
                    return success;
                });
            this.levels = levels.message;
        },
        getIdioms: async function (url) {
            let idioms = await jQuery
                .ajax({
                    url:
                        this.url +
                        "/incluyeme-login-extension/include/search/idioms.php?idiomsAll=allRegistro",
                    type: "GET",
                    dataType: "json",
                })
                .done((success) => {
                    return success;
                });
            this.idiom = idioms.message;
        },
        addStudies: async function () {
            this.formFields.push(1);
            this.$nextTick(function () {
                jQuery(".selectpicker").selectpicker("refresh");
            });
        },
        addExp: async function () {
            this.formFields2.push(1);
            this.$nextTick(function () {
                jQuery(".selectpicker").selectpicker("refresh");
            });
        },
        addIdioms: async function () {
            this.formFields3.push(1);
            this.$nextTick(function () {
                jQuery(".selectpicker").selectpicker("refresh");
            });
        },
        goToTop: function () {
            const content = jQuery("#content").offset()
                ? jQuery("#content").offset()
                : jQuery("#main-content").offset();
            jQuery("html, bfody").animate(
                {
                    scrollTop: content.top - 20,
                },
                500
            );
        },
        deleteStudies: async function (index) {
            this.formFields.splice(index, 1);
            this.country_edu.splice(index, 1);
            this.university_edu.splice(index, 1);
            this.university_otro.splice(index, 1);
            this.studies.splice(index, 1);
            this.titleEdu.splice(index, 1);
            this.eduLevel.splice(index, 1);
            this.dateStudiesD.splice(index, 1);
            this.dateStudiesH.splice(index, 1);
            this.dateStudieB.splice(index, 1);
        },
        deleteExp: async function (index) {
            this.formFields2.splice(index, 1);
            this.employed.splice(index, 1);
            this.areaEmployed.splice(index, 1);
            this.jobs.splice(index, 1);
            this.levelExperience.splice(index, 1);
            this.actuWork.splice(index, 1);
            this.dateStudiesDLaboral.splice(index, 1);
            this.dateStudiesHLaboral.splice(index, 1);
            this.jobsDescript.splice(index, 1);
        },
        deleteIdioms: async function (index) {
            this.formFields3.splice(index, 1);
            this.lecLevel.splice(index, 1);
            this.redLevel.splice(index, 1);
            this.idioms.splice(index, 1);
            this.oralLevel.splice(index, 1);
        },
        pleaseAwait: function () {
            this.validation = false;
            iziToast.info({
                title: "Confirmando",
                message: "Estamos verificando tu información, por favor espera.",
                progressBarColor: "rgb(0,0,0)",
                buttons: [
                    [
                        "<button>Cerrar</button>",
                        function (instance, toast) {
                            instance.hide(
                                {
                                    transitionOut: "fadeOutUp",
                                    onClosing: function (instance, toast, closedBy) {
                                    },
                                },
                                toast,
                                "buttonName"
                            );
                        },
                    ],
                ],
            });
        },
        confirmStep6: async function (step) {
            if (
                !this.motriz &&
                !this.visceral &&
                !this.auditiva &&
                !this.visual &&
                !this.intelectual &&
                !this.psiquica &&
                !this.habla
            ) {
                this.validation = 12;
            } else {
                this.currentStep = step;
                this.validation = null;
            }
            this.goToTop();
        },
        renderPickers: function () {
            jQuery(".selectpicker").selectpicker("refresh");
        },
    },
    watch: {
        state: function (val, old) {
            if (val === "Otra") {
                this.showTextInputState = true;
                this.$nextTick(() => {
                    this.state = null;
                });
            }
        },
        city: function (val, old) {
            if (val === "Otra") {
                this.showTextInputCity = true;
                this.$nextTick(() => {
                    this.city = null;
                });
            }
        },
        currentStep: function (val, old) {
            if (val === 4) {
                this.$nextTick(function () {
                    jQuery("#city").selectpicker("refresh");
                    jQuery("#state").selectpicker("refresh");
                    jQuery("[data-id='country_edu']").css("display", "none");
                    jQuery("[data-id='university_edu']").css("display", "none");
                });
            }
            if (val === 3) {
                this.$nextTick(function () {
                    jQuery("#country_nac").addClass("show-important");
                    jQuery("#country_nac").selectpicker("refresh");
                    jQuery("[data-id='country_nac']").css("display", "block");
                });
            }
            if (val === 8) {
                this.$nextTick(function () {
                    jQuery("#edu_levelMax").selectpicker("refresh");
                    jQuery("#university_edu").selectpicker("refresh");
                    jQuery("#country_edu").selectpicker("refresh");
                    jQuery("#studies").selectpicker("refresh");
                });
            }
            if (val === 9) {
                jQuery("#country_edu").css("display", "none");
                this.$nextTick(function () {
                    jQuery("[data-id='country_edu']").css("display", "none");
                    jQuery("[data-id='university_edu']").css("display", "none");
                    jQuery("#studies").selectpicker("refresh");
                });
            }
            if (val === 10) {
                this.$nextTick(function () {
                    jQuery("#studies").selectpicker("hide");
                    jQuery("#lecLevel").selectpicker("refresh");
                    jQuery("#redLevel").selectpicker("refresh");
                    jQuery("#idioms").selectpicker("refresh");
                    jQuery("#oralLevel").selectpicker("refresh");
                    jQuery("[data-id='preferJobs']").css("display", "none");
                });
            }
            if (val === 11) {
                this.$nextTick(function () {
                    jQuery("#studies").selectpicker("hide");
                    jQuery("#preferJobs").selectpicker("refresh");
                    jQuery("#redLevel").selectpicker("hide");
                    jQuery("#idioms").selectpicker("hide");
                    jQuery("#oralLevel").selectpicker("hide");
                });
            }
            if (val === 12) {
                this.$nextTick(function () {
                    jQuery("#preferJobs").selectpicker("hide");
                });
            }
            if (val === 13) {
                this.$nextTick(function () {
                    jQuery("#meetingIncluyeme").addClass("show-important");
                    jQuery("#meetingIncluyeme").selectpicker("refresh");
                    jQuery("[data-id='meetingIncluyeme']").css("display", "block");
                });
            }
        },
        cities: function () {
            this.$nextTick(function () {
                jQuery(".selectpicker").selectpicker("refresh");
            });
        },
        universities: function () {
            this.$nextTick(function () {
                jQuery(".selectpicker").selectpicker("refresh");
            });
        },
        study: function () {
            this.$nextTick(function () {
                jQuery(".selectpicker").selectpicker("refresh");
            });
        },
        experiences: function () {
            this.$nextTick(function () {
                jQuery(".selectpicker").selectpicker("refresh");
            });
        },
        idiom: function () {
            this.$nextTick(function () {
                jQuery(".selectpicker").selectpicker("refresh");
            });
        },
        levels: function () {
            this.$nextTick(function () {
                jQuery(".selectpicker").selectpicker("refresh");
            });
        },
        country_edu: function () {
            this.$nextTick(function () {
                jQuery(".selectpicker").selectpicker("refresh");
            });
        },
    },
});
startApp();
