Vue.config.ignoredElements = ['x-incluyeme', 'fb:login-button']
Vue.component('step1', {
    template: '#step1',
    props: [
        'currentStep',
        'step1'
    ]
});
Vue.component('step2', {
    template: '#step2',
    props: [
        'currentStep',
        'step2'
    ]
});
Vue.component('step3', {
    template: '#step3',
    props: [
        'currentStep',
        'step1',
        'step2'
    ]
});
Vue.component('step4', {
    template: '#step4',
    props: [
        'currentStep',
        'step1',
        'step2'
    ]
});
Vue.component('step5', {
    template: '#step5',
    props: [
        'currentStep',
        'step1',
        'step2'
    ]
});
Vue.component('step6', {
    template: '#step6',
    props: [
        'currentStep',
        'step1',
        'step2'
    ]
});
Vue.component('step7', {
    template: '#step7',
    props: [
        'currentStep',
        'step1',
        'step2'
    ]
});
Vue.component('step8', {
    template: '#step8',
    props: [
        'currentStep',
        'step1',
        'step2'
    ]
});
Vue.component('step9', {
    template: '#step9',
    props: [
        'currentStep',
        'step1',
        'step2'
    ]
});
Vue.component('step10', {
    template: '#step10',
    props: [
        'currentStep',
        'step1',
        'step2'
    ]
});
Vue.component('step11', {
    template: '#step11',
    props: [
        'currentStep',
        'step1',
        'step2'
    ]
});
Vue.component('step12', {
    template: '#step12',
    props: [
        'currentStep',
        'step1',
        'step2'
    ]
});
let app = new Vue({
    el: '#incluyeme-login-wpjb',
    data: {
        userID: null,
        dateStudiesDLaboral: [],
        dateStudiesHLaboral: [],
        url: null,
        countries: [],
        universities: [],
        passwordConfirm: null,
        genre: null,
        name: null,
        cities: [],
        email: null,
        password: null,
        street: null,
        lastName: null,
        formFields3: [],
        dateBirthDay: null,
        disCap: null,
        idioms: null,
        levels: null,
        university_otro: [],
        disClass: 'w-100',
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
        state: null,
        currentStep: 1,
        country_edu: [],
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
        inteTrabajarOP: null
    },
    ready: function () {
        console.log('ready');
    },
    mounted() {
        this.formFields2.push(1);
        this.formFields3.push(1);
    },
    methods: {
        goToStep: async function (step, url = false) {
            if (this.currentStep === 12) {
                return;
            }
            this.url = url;
            if (this.awaitChange === true) {
                return;
            }
            switch (step) {
                case 2:
                    this.awaitChange = true;
                    if (await this.confirmStep2(step) === true && this.currentStep <= 2) {
                        this.getLevelsIdioms().finally();
                        this.getIdioms().finally();
                        this.getCountries().finally();
                        this.getStudies().finally();
                        this.getExperiences().finally();
                        this.getPrefersJobs().finally();
                        this.getProvincias().finally();
                        this.currentStep = step;
                    }
                    break;
                case 3:
                    if (this.currentStep <= 3) {
                        this.awaitChange = true;
                        await this.confirmStep3(step);
                    } else {
                        this.currentStep = step;
                    }
                    break;
                case 4:
                    if (this.currentStep <= 4) {
                        this.awaitChange = true;
                        await this.confirmStep4(step);

                    } else {
                        this.currentStep = step;
                    }
                    break;
                case 5:
                    if (this.currentStep <= 5) {

                        this.awaitChange = true;
                        await this.confirmStep5(step);
                    } else {
                        this.currentStep = step;
                    }
                    break;
                case 6:
                    await this.confirmStep6(step);
                    break;
                case 7:
                    if (this.currentStep <= 7) {
                        this.awaitChange = true;
                        await this.confirmStep7(step);
                    } else {
                        this.currentStep = step
                    }
                    break;
                case 8:
                    if (this.currentStep <= 8) {
                        this.awaitChange = true;
                        await this.confirmStep8(step);
                    } else {
                        this.currentStep = step
                    }
                    break;
                case 9:
                    if (this.currentStep <= 9) {
                        this.awaitChange = true;
                        await this.confirmStep9(step)
                    } else {
                        this.currentStep = step
                    }
                    break;
                case 10:
                    if (this.currentStep <= 10) {
                        this.awaitChange = true;
                        await this.confirmStep10(step)
                    } else {
                        this.currentStep = step
                    }
                    break;
                case 11:
                    if (this.currentStep <= 11) {
                        this.awaitChange = true;
                        await this.confirmStep11(step)
                    } else {
                        this.currentStep = step
                    }
                    break;
                case 12:
                    if (this.currentStep <= 12) {
                        this.awaitChange = true;
                        await this.confirmStep12(step)
                    } else {
                        this.currentStep = step
                    }
                    break;
                default:
                    this.currentStep = step;
            }

        },
        drop: async function () {
            this.currentStep = 7;
        },
        dropzone: async function () {
            const url = this.url + '/incluyeme-login-extension/include/verifications/register.php';
            const id = this.userID;
            jQuery("#demo-upload").dropzone({
                init: function () {
                    const dropzone = this;
                    clearDropzone = function(){
                        dropzone.removeAllFiles(true);
                    };
                },
                url: url,
                maxFiles: 1,
                acceptedFiles: 'image/jpg, image/png, image/jpeg',
                addRemoveLinks: true,
                dictInvalidFileType: 'El tipo de archivo que ha subido no es valido, aceptamos imagenes en formato .jpg, .png, .jpeg',
                dictFileTooBig: 'Su archivo no puede pesar mas de 5MB',
                sending: function (file, xhr, formData) {
                    formData.append('userID', id);
                },
                dictMaxFilesExceeded: 'Solo puede subir un archivo, por favor, elimine su archivo anterior',
                paramName: 'img_path',
                maxFilesize: 5,
                dictCancelUpload: 'Cancelar',
                dictRemoveFile: 'Eliminar',
                removedfile: function (file) {
                    let x = true;
                    if (!x) return false;
                    jQuery.ajax({
                        type: 'POST',
                        url: url,
                        data: {
                            "userID": id,
                            "removeIMG": 'remove'
                        },
                        dataType: 'json'
                    });
                    let _ref;
                    this.removeAllFiles(true);
                    return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;

                },
            });
            jQuery("#CVDROP").dropzone({
                url: url,
                maxFiles: 1,
                acceptedFiles: 'application/pdf,.doc,.docx',
                addRemoveLinks: true,
                dictInvalidFileType: 'El tipo de archivo que ha subido no es valido, aceptamos archivos .pdf, .doc o .docx',
                dictFileTooBig: 'Su archivo no puede pesar mas de 5MB',
                sending: function (file, xhr, formData) {
                    formData.append('userID', id);
                },
                dictMaxFilesExceeded: 'Solo puede subir un archivo, por favor, elimine su archivo anterior',
                paramName: 'cv',
                maxFilesize: 5,
                dictCancelUpload: 'Cancelar',
                dictRemoveFile: 'Eliminar',
                removedfile: function (file) {
                    let x = true;
                    if (!x) return false;
                    jQuery.ajax({
                        type: 'POST',
                        url: url,
                        data: {
                            "userID": id,
                            "RemoveCV": 'remove'
                        },
                        dataType: 'json'
                    });
                    let _ref;
                    this.removeAllFiles(true);
                    return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
                }
            });
            jQuery("#CUDDROP").dropzone({
                url: url,
                maxFiles: 1,
                acceptedFiles: 'application/pdf,.doc,.docx',
                addRemoveLinks: true,
                dictInvalidFileType: 'El tipo de archivo que ha subido no es valido, aceptamos imagenes en formato .jpg, .png, .jpeg',
                dictFileTooBig: 'Su archivo no puede pesar mas de 5MB',
                sending: function (file, xhr, formData) {
                    formData.append('userID', id);
                },
                dictMaxFilesExceeded: 'Solo puede subir un archivo, por favor, elimine su archivo anterior',
                paramName: 'cud',
                maxFilesize: 5,
                dictCancelUpload: 'Cancelar',
                dictRemoveFile: 'Eliminar',
                removedfile: function (file) {
                    let x = true;
                    if (!x) return false;
                    jQuery.ajax({
                        type: 'POST',
                        url: url,
                        data: {
                            "userID": id,
                            "removeCUD": 'remove'
                        },
                        dataType: 'json'
                    });
                    let _ref;
                    this.removeAllFiles(true);
                    return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
                }
            });
        },
        isValidEmail: async function (email) {
            const re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(email);
        },
        confirmStep2: async function (step) {
            this.goToTop();
            let confirmEmail = await this.isValidEmail(this.email);
            if (!confirmEmail || this.password === null || !this.password) {
                this.validation = 2;
                this.awaitChange = false;
                    jQuery("#emil").css('border-color', "red");
                    jQuery("#emilLabel").css('color', "red");
                    jQuery("#inputPassword4").removeAttr("style");
                    jQuery("#labelPassword4").removeAttr("style");
                    jQuery("#repostP").removeAttr("style");
                    jQuery("#repostPLabel").removeAttr("style");
                return false;
                } else if (this.password === null || !this.password) {
                this.validation = 3;
                jQuery("#inputPassword4").css('border-color', "red");
                jQuery("#labelPassword4").css('color', "red");
                jQuery("#emil").removeAttr("style");
                jQuery("#emilLabel").removeAttr("style");

                return false;
            } else if (this.password.length < 5) {
                this.validation = 3;
                jQuery("#inputPassword4").css('border-color', "red");
                jQuery("#labelPassword4").css('color', "red");
                this.awaitChange = false;
                return false;
            } else if (this.password !== this.passwordConfirm) {
                this.validation = 4;
                jQuery("#repostP").css('border-color', "red");
                jQuery("#repostPLabel").css('color', "red");
                jQuery("#inputPassword4").removeAttr("style");
                jQuery("#labelPassword4").removeAttr("style");
                jQuery("#emil").removeAttr("style");
                jQuery("#emilLabel").removeAttr("style");
                this.awaitChange = false;
                return false;
            }
            this.pleaseAwait();
            let verifications = await axios.post(this.url + '/incluyeme-login-extension/include/verifications/register.php', {
                email: this.email,
                password: this.password
            })
                .then(function (response) {
                    return response
                })
                .catch(function (error) {
                    return true;
                });
            if (verifications.data.message === true) {
                this.validation = 1;
                jQuery("#repostP").removeAttr("style");
                jQuery("#repostPLabel").removeAttr("style");
                jQuery("#inputPassword4").removeAttr("style");
                jQuery("#labelPassword4").removeAttr("style");
                jQuery("#emil").css('border-color', "red");
                jQuery("#emilLabel").css('color', "red");
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
                lastName: this.lastName
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
            let verifications = await jQuery.ajax({
                url: this.url + '/incluyeme-login-extension/include/verifications/register.php',
                type: 'POST',
                data: data
            }).done(function (response, status, xhr) {
                var ct = xhr.getResponseHeader("content-type") || "";
                if (ct.indexOf('html') > -1) {
                    window.location.href = '/candidate-panel';
                }
                return response
            })

            this.awaitChange = false;
            this.userID = verifications.message;
            this.currentStep = 3;
            data.googleID = verifications.message
            await jQuery.ajax({
                url: this.url + '/incluyeme-login-extension/include/verifications/register.php',
                type: 'POST',
                data: data
            }).done(function (response, status, xhr) {
                return response
            })
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
            this.goToTop();
            if (!this.name) {
                this.validation = 5;
                jQuery("#names").css('border-color', "red");
                jQuery("#nameLabel").css('color', "red");
                jQuery("#lastNames").removeAttr("style");
                jQuery("#lastNamesLabel").removeAttr("style");
                this.awaitChange = false;
                return false;
            } else if (!this.lastName) {
                this.validation = 6;
                jQuery("#lastNames").css('border-color', "red");
                jQuery("#lastNamesLabel").css('color', "red");
                jQuery("#names").removeAttr("style");
                jQuery("#nameLabel").removeAttr("style");
                this.awaitChange = false;
                return false;
            }
            this.pleaseAwait();
            let verifications = await axios.post(this.url + '/incluyeme-login-extension/include/verifications/register.php', {
                email: this.email,
                password: this.password,
                name: this.name,
                lastName: this.lastName
            })
                .then(function (response) {
                    return response
                })
                .catch(function (error) {
                    return true;
                });
            this.userID = verifications.data.message;
            this.awaitChange = false;
            this.currentStep = step;
        },
        confirmStep4: async function (step) {
            this.goToTop();
            if (!this.genre) {
                this.validation = 7;
                jQuery("#inlineCheckbox1").css('color', "red");
                jQuery("#genreP").css('color', "red");
                jQuery("#inlineCheckbox2").css('color', "red");
                jQuery("#inlineCheckbox3").css('color', "red");
                jQuery("#dateBirthDay").removeAttr('style');
                jQuery("#labeldateBirthDay").removeAttr('style');
                this.awaitChange = false;
                return;
            } else if (!this.dateBirthDay) {
                this.validation = 8;
                jQuery("#inlineCheckbox1").removeAttr("style");
                jQuery("#inlineCheckbox2").removeAttr("style");
                jQuery("#inlineCheckbox3").removeAttr("style");
                jQuery("#genreP").removeAttr("style");
                jQuery("#dateBirthDay").css('border-color', "red");
                jQuery("#labeldateBirthDay").css('color', "red");
                this.awaitChange = false;
                return;
            }
            this.awaitChange = false;
            this.currentStep = step;
        },
        confirmStep5: async function (step) {
            this.goToTop();
            let labelPhone = jQuery("#labelPhone");
            let labelState = jQuery("#labelState");
            let labelCity = jQuery("#labelCity");
            if (!this.mPhone) {
                this.validation = 9;
                labelPhone.css('color', "red");
                labelState.removeAttr("style");
                labelCity.removeAttr("style");
                this.awaitChange = false;
                return;
            }
            if (!this.phone) {
                this.validation = 20;
                labelPhone.css('color', "red");
                labelState.removeAttr("style");
                labelCity.removeAttr("style");
                this.awaitChange = false;
                return;
            }
            if (!this.state) {
                this.validation = 10;
                labelPhone.removeAttr("style");
                labelCity.removeAttr("style");

                labelState.css('color', "red");
                this.awaitChange = false;
                return;
            }
            if (!this.city) {
                this.validation = 11;
                labelPhone.removeAttr("style");
                labelState.removeAttr("style");

                labelCity.css('color', "red");
                this.awaitChange = false;
                return;
            }
            this.pleaseAwait();
            let verification = await axios.post(this.url + '/incluyeme-login-extension/include/verifications/register.php', {
                mPhone: this.mPhone,
                state: this.state,
                city: this.city,
                fPhone: this.fPhone,
                fiPhone: this.fiPhone,
                street: this.street,
                genre: this.genre,
                dateBirthDay: this.dateBirthDay,
                userID: this.userID,
                phone: this.phone
            })
                .then(function (response) {
                    return response
                })
                .catch(function (error) {
                    return true;
                });
            this.userID = verification.data.message;
            this.awaitChange = false;
            this.currentStep = step;

        },
        confirmStep7: async function (step) {
            this.goToTop();
            let disCText = jQuery("#disCText");
            if (!this.moreDis) {
                this.validation = 11;
                disCText.css('color', "red");

                jQuery('#exampleFormControlTextarea1').css('border-color', "red");
                this.awaitChange = false;
                return;
            }
            this.pleaseAwait();
            const data = {
                moreDis: this.moreDis,
                userID: this.userID,
                discaps: []
            }
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
                data.inteTrabajarOP = this.inteTrabajarOP
            }
            if (this.psiquica) {
                data.discaps.push(6);
                data.psiquica = 6;
            }
            if (this.habla) {
                data.discaps.push(7);
                data.habla = 7;
            }
            await axios.post(this.url + '/incluyeme-login-extension/include/verifications/register.php', data)
                .then(function (response) {
                    return response
                })
                .catch(function (error) {
                    return true;
                });
            this.currentStep = step;
            await this.drop();
            this.dropzone();
            this.awaitChange = false;

        },
        confirmStep8: async function (step) {
            this.goToTop();
            this.awaitChange = false;
            this.currentStep = step;
        },
        confirmStep9: async function (step) {
            this.goToTop();
            this.pleaseAwait();
            await axios.post(this.url + '/incluyeme-login-extension/include/verifications/register.php', {
                userID: this.userID,
                country_edu: this.country_edu,
                university_edu: this.university_edu,
                university_otro: this.university_otro,
                studies: this.studies,
                titleEdu: this.titleEdu,
                eduLevel: this.eduLevel,
                dateStudiesD: this.dateStudiesD,
                dateStudiesH: this.dateStudiesH,
                dateStudieB: this.dateStudieB
            })
                .then(function (response) {
                    return response
                })
                .catch(function (error) {
                    return true;
                });
            this.awaitChange = false;
            this.currentStep = step;
        },
        confirmStep10: async function (step) {
            this.goToTop();
            this.pleaseAwait();
            await axios.post(this.url + '/incluyeme-login-extension/include/verifications/register.php', {
                userID: this.userID,
                employed: this.employed,
                areaEmployed: this.areaEmployed,
                jobs: this.jobs,
                levelExperience: this.levelExperience,
                actuWork: this.actuWork,
                dateStudiesDLaboral: this.dateStudiesDLaboral,
                dateStudiesHLaboral: this.dateStudiesHLaboral,
                jobsDescript: this.jobsDescript
            })
                .then(function (response) {
                    return response
                })
                .catch(function (error) {
                    return true;
                });
            this.awaitChange = false;
            this.currentStep = step;
        },
        confirmStep11: async function (step) {
            this.goToTop();
            this.pleaseAwait();
            await axios.post(this.url + '/incluyeme-login-extension/include/verifications/register.php', {
                userID: this.userID,
                idioms: this.idioms,
                oLevel: this.oralLevel,
                wLevel: this.redLevel,
                sLevel: this.lecLevel,
                idiomsOther: this.idiomsOther
            })
                .then(function (response) {
                    return response
                })
                .catch(function (error) {
                    return true;
                });
            this.awaitChange = false;
            this.currentStep = step;
        },
        confirmStep12: async function (step) {
            this.pleaseAwait();
            await axios.post(this.url + '/incluyeme-login-extension/include/verifications/register.php', {
                userID: this.userID,
                preferJobs: this.preferJobs
            })
                .then(function (response) {
                    return response
                })
                .catch(function (error) {
                    return true;
                });
            this.awaitChange = false;
            this.currentStep = step;
            window.location.href = '/thank-you';
        },
        getUniversities: async function (id) {
            let universities = await this.getUniver(id);
            this.universities[id] = universities.data.message;
            Vue.set(app.universities, id, universities.data.message)
            if (universities.data.message.length !== 0) {
                this.university_edu[id] = universities.data.message[0].university;
            } else {
                this.university_edu[id] = null;
            }
        },
        changeUniversity: function (id, changes) {
            if (changes === true) {
                Vue.set(app.university_otro, id, false)
            } else {
                Vue.set(app.university_edu, id, false);
            }
        },
        getUniver: async function (id) {
            return axios.get(this.url + '/incluyeme-login-extension/include/search/countries.php?countries=' + this.country_edu[id], {})
                .then(function (response) {
                    return response
                })
                .catch(function (error) {
                    console.log(error);
                });
        },
        getCities: async function (id) {
            let cities = await jQuery.ajax({
                url: this.url + '/incluyeme-login-extension/include/search/countries.php?city=' + this.state,
                type: 'GET',
                dataType: 'json'
            }).done(success => {
                return success;
            });
            this.cities = cities.message;
        },
        getCountries: async function (url) {
            let countries = await jQuery.ajax({
                url: this.url + '/incluyeme-login-extension/include/search/countries.php?countries=all',
                type: 'GET',
                dataType: 'json'
            }).done(success => {
                return success;
            });
            this.countries = countries.message
        },
        getStudies: async function (url) {
            this.formFields.push(1)
            let studies = await jQuery.ajax({
                url: this.url + '/incluyeme-login-extension/include/search/studies.php?studies=all',
                type: 'GET',
                dataType: 'json'
            }).done(success => {
                return success;
            });
            this.study = studies.message
        },
        getExperiences: async function (url) {
            let experiences = await jQuery.ajax({
                url: this.url + '/incluyeme-login-extension/include/search/experiencesAreas.php?experiences=all',
                type: 'GET',
                dataType: 'json'
            }).done(success => {
                return success;
            });
            this.experiences = experiences.message
        },
        getPrefersJobs: async function (url) {
            let preferJob = await jQuery.ajax({
                url: this.url + '/incluyeme-login-extension/include/search/prefersJobs.php?experiences=all',
                type: 'GET',
                dataType: 'json'
            }).done(success => {
                return success;
            });
            this.preferJob = preferJob.message
        },
        getProvincias: async function (url) {
            let provincias = await jQuery.ajax({
                url: this.url + '/incluyeme-login-extension/include/search/countries.php?provincias=CVC',
                type: 'GET',
                dataType: 'json'
            }).done(success => {
                return success;
            });
            this.provincias = provincias.message
        },
        getLevelsIdioms: async function (url) {
            let levels = await jQuery.ajax({
                url: this.url + '/incluyeme-login-extension/include/search/idioms.php?levels=all',
                type: 'GET',
                dataType: 'json'
            }).done(success => {
                return success;
            });
            this.levels = levels.message
        },
        getIdioms: async function (url) {
            let idioms = await jQuery.ajax({
                url: this.url + '/incluyeme-login-extension/include/search/idioms.php?idioms=all',
                type: 'GET',
                dataType: 'json'
            }).done(success => {
                return success;
            });
            this.idiom = idioms.message
        },
        addStudies: async function () {
            this.formFields.push(1);
        },
        addExp: async function () {
            this.formFields2.push(1);
        },
        addIdioms: async function () {
            this.formFields3.push(1);
        },
        goToTop: function () {
            document.getElementById('content').scrollIntoView({behavior: "smooth", block: "center", inline: "nearest"});
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
                title: 'Confirmando',
                message: 'Estamos verificando tu información, por favor espera.',
                progressBarColor: 'rgb(0,0,0)',
                buttons: [
                    ['<button>Cerrar</button>', function (instance, toast) {
                        instance.hide({
                            transitionOut: 'fadeOutUp',
                            onClosing: function (instance, toast, closedBy) {
                            }
                        }, toast, 'buttonName');
                    }]
                ],
            });
        },
        confirmStep6: async function (step) {
            this.goToTop();
            if (!this.motriz && !this.visceral && !this.auditiva && !this.visual && !this.intelectual) {
                jQuery("#disSelects").css('color', "red");
                this.validation = 12
            } else {
                jQuery("#disSelects").removeAttr("style");
                this.currentStep = step;
                this.validation = null;
            }
        }
    }
});
startApp();
