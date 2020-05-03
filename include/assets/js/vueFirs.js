Vue.config.ignoredElements = ['x-incluyeme']
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
        dateBirthDay: null,
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
        awaitChange: false,
        google: false,
        facebook: false,
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
                    if (await this.confirmStep2(step) && this.currentStep <= 2) {
                        this.getLevelsIdioms().finally();
                        this.getIdioms().finally();
                        this.getCountries().finally();
                        this.getStudies().finally();
                        this.getExperiences().finally();
                        this.getPrefersJobs().finally();
                    } else {
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

            const $ = jQuery;
            $(function () {
                let dropZoneId = "drop-zone";
                let buttonId = "clickHere";
                let mouseOverClass = "mouse-over";

                let dropZone = $("#" + dropZoneId);
                let ooleft = dropZone.offset().left;
                let ooright = dropZone.outerWidth() + ooleft;
                let ootop = dropZone.offset().top;
                let oobottom = dropZone.outerHeight() + ootop;
                let inputFile = dropZone.find("input");
                document.getElementById(dropZoneId).addEventListener("dragover", function (e) {
                    e.preventDefault();
                    e.stopPropagation();
                    dropZone.addClass(mouseOverClass);
                    let x = e.pageX;
                    let y = e.pageY;

                    if (!(x < ooleft || x > ooright || y < ootop || y > oobottom)) {
                        inputFile.offset({top: y - 15, left: x - 100});
                    } else {
                        inputFile.offset({top: -400, left: -400});
                    }

                }, true);

                if (buttonId != "") {
                    let clickZone = $("#" + buttonId);

                    let oleft = clickZone.offset().left;
                    let oright = clickZone.outerWidth() + oleft;
                    let otop = clickZone.offset().top;
                    let obottom = clickZone.outerHeight() + otop;

                    $("#" + buttonId).mousemove(function (e) {
                        let x = e.pageX;
                        let y = e.pageY;
                        if (!(x < oleft || x > oright || y < otop || y > obottom)) {
                            inputFile.offset({top: y - 15, left: x - 160});
                        } else {
                            inputFile.offset({top: -400, left: -400});
                        }
                    });
                }

                document.getElementById(dropZoneId).addEventListener("drop", function (e) {
                    $("#" + dropZoneId).removeClass(mouseOverClass);
                }, true);

            })
            $(function () {
                let dropZoneId = "drop-zoneCV";
                let buttonId = "clickHereCV";
                let mouseOverClass = "mouse-over";

                let dropZone = $("#" + dropZoneId);
                let ooleft = dropZone.offset().left;
                let ooright = dropZone.outerWidth() + ooleft;
                let ootop = dropZone.offset().top;
                let oobottom = dropZone.outerHeight() + ootop;
                let inputFile = dropZone.find("input");
                document.getElementById(dropZoneId).addEventListener("dragover", function (e) {
                    e.preventDefault();
                    e.stopPropagation();
                    dropZone.addClass(mouseOverClass);
                    let x = e.pageX;
                    let y = e.pageY;

                    if (!(x < ooleft || x > ooright || y < ootop || y > oobottom)) {
                        inputFile.offset({top: y - 15, left: x - 100});
                    } else {
                        inputFile.offset({top: -400, left: -400});
                    }

                }, true);

                if (buttonId != "") {
                    let clickZone = $("#" + buttonId);

                    let oleft = clickZone.offset().left;
                    let oright = clickZone.outerWidth() + oleft;
                    let otop = clickZone.offset().top;
                    let obottom = clickZone.outerHeight() + otop;

                    $("#" + buttonId).mousemove(function (e) {
                        let x = e.pageX;
                        let y = e.pageY;
                        if (!(x < oleft || x > oright || y < otop || y > obottom)) {
                            inputFile.offset({top: y - 15, left: x - 160});
                        } else {
                            inputFile.offset({top: -400, left: -400});
                        }
                    });
                }

                document.getElementById(dropZoneId).addEventListener("drop", function (e) {
                    $("#" + dropZoneId).removeClass(mouseOverClass);
                }, true);

            })
            $(function () {
                let dropZoneId = "drop-zoneCUD";
                let buttonId = "clickHereCUD";
                let mouseOverClass = "mouse-over";

                let dropZone = $("#" + dropZoneId);
                let ooleft = dropZone.offset().left;
                let ooright = dropZone.outerWidth() + ooleft;
                let ootop = dropZone.offset().top;
                let oobottom = dropZone.outerHeight() + ootop;
                let inputFile = dropZone.find("input");
                document.getElementById(dropZoneId).addEventListener("dragover", function (e) {
                    e.preventDefault();
                    e.stopPropagation();
                    dropZone.addClass(mouseOverClass);
                    let x = e.pageX;
                    let y = e.pageY;

                    if (!(x < ooleft || x > ooright || y < ootop || y > oobottom)) {
                        inputFile.offset({top: y - 15, left: x - 100});
                    } else {
                        inputFile.offset({top: -400, left: -400});
                    }

                }, true);

                if (buttonId != "") {
                    let clickZone = $("#" + buttonId);

                    let oleft = clickZone.offset().left;
                    let oright = clickZone.outerWidth() + oleft;
                    let otop = clickZone.offset().top;
                    let obottom = clickZone.outerHeight() + otop;

                    $("#" + buttonId).mousemove(function (e) {
                        let x = e.pageX;
                        let y = e.pageY;
                        if (!(x < oleft || x > oright || y < otop || y > obottom)) {
                            inputFile.offset({top: y - 15, left: x - 160});
                        } else {
                            inputFile.offset({top: -400, left: -400});
                        }
                    });
                }

                document.getElementById(dropZoneId).addEventListener("drop", function (e) {
                    $("#" + dropZoneId).removeClass(mouseOverClass);
                }, true);

            })
        },
        cargaImg: async function () {
            this.image = null;
            this.img = null;
            this.reader = null;
            if (event.target.files[0]['type'] !== 'image/jpeg' && event.target.files[0]['type'] !== 'image/png' && event.target.files[0]['type'] !== 'image/jpg') {
                alert('El tipo de archivo que ha subido no es valido, aceptamos imagenes en formato .jpg, .png, .jpeg');
                document.getElementById("userIMG").value = "";
                return;
            }
            this.image = event.target.files[0];
            let reader = new FileReader();
            reader.onload = (event) => {
                this.img = event.target.result;
            };
            this.reader = reader.readAsDataURL(this.image);
        },
        cargaCV: async function () {
            this.cv = null;
            this.cvSHOW = null;
            this.cvReader = null;
            if (event.target.files[0]['type'] !== 'application/pdf' && !(/\.(doc?x|pdf)$/i.test(event.target.files[0].name))) {
                alert('El tipo de archivo que ha subido no es valido, aceptamos documentos en formato .doc, .docx, .pdf');
                document.getElementById("userCV").value = "";
                return;
            }
            this.cv = event.target.files[0];
            let reader = new FileReader();
            reader.onload = (event) => {
                this.cvSHOW = event.target.result;
            };
            this.cvReader = reader.readAsDataURL(this.cv);
        },
        cargaCUD: async function () {
            this.cud = null;
            this.cudSHOW = null;
            this.cudReader = null;
            if (event.target.files[0]['type'] !== 'application/pdf' && !(/\.(doc?x|pdf)$/i.test(event.target.files[0].name))) {
                alert('El tipo de archivo que ha subido no es valido, aceptamos documentos en formato .doc, .docx, .pdf');
                document.getElementById("userCUD").value = "";
                return;
            }
            this.cud = event.target.files[0];
            let reader = new FileReader();
            reader.onload = (event) => {
                this.cudSHOW = event.target.result;
            };
            this.cudReader = reader.readAsDataURL(this.cud);
        },
        isValidEmail: async function (email) {
            const re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(email);
        },
        confirmStep2: async function (step) {
            if (!await this.isValidEmail(this.email) || this.password === null || !this.password) {
                iziToast.warning({
                    title: 'Verifique',
                    message: 'Por favor, llene todos los campos',
                    progressBarColor: 'rgb(0, 255, 184)',
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
                if (this.password.length < 5) {
                    iziToast.warning({
                        title: 'Verifique',
                        message: 'Su contraseña debe contener cinco(5) caracteres o mas',
                        progressBarColor: 'rgb(0, 255, 184)',
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
                }
                return false;
            } else if (this.password !== this.passwordConfirm) {
                iziToast.warning({
                    title: 'Verifique',
                    message: 'Su contraseña no coincide',
                    progressBarColor: 'rgb(0, 255, 184)',
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
                iziToast.warning({
                    title: 'Verifique',
                    message: 'Este email ya se encuentra segistrado',
                    progressBarColor: 'rgb(0, 255, 184)',
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
                this.awaitChange = false;
                return false;
            } else if (verifications.data.message === false) {
                this.awaitChange = false;
                this.currentStep = step;
            }
            this.awaitChange = false;
            return true;
        },
        googleChange: async function (url) {
            this.url = url;
            let verifications = await jQuery.ajax({
                url: this.url + '/incluyeme-login-extension/include/verifications/register.php',
                type: 'POST',
                data: {
                    email: this.email,
                    password: this.password,
                    google: this.google,
                    name: this.name,
                    lastName: this.lastName
                }
            }).done(function (response) {
                return response
            })

            if (verifications.message === false) {
                this.userID = verifications.message;
            } else {
                window.location.href = window.location + '/candidate-panel';
            }
            return true;
        },
        confirmStep3: async function (step) {
            if (!this.name || !this.lastName) {
                iziToast.warning({
                    title: 'Verifique',
                    message: 'Por favor, llene todos los campos',
                    progressBarColor: 'rgb(0, 255, 184)',
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
                this.awaitChange = false;
                return;
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
            if (!this.genre || !this.dateBirthDay) {
                iziToast.warning({
                    title: 'Verifique',
                    message: 'Por favor, llene todos los campos',
                    progressBarColor: 'rgb(0, 255, 184)',
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
                this.awaitChange = false;
                return;
            }
            this.awaitChange = false;
            this.currentStep = step;
        },
        confirmStep5: async function (step) {
            if (!this.mPhone || !this.phone) {
                iziToast.warning({
                    title: 'Verifique',
                    message: 'Por favor, ingrese su numero de teléfono',
                    progressBarColor: 'rgb(0, 255, 184)',
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
                this.awaitChange = false;
                return;
            }
            if (!this.state) {
                iziToast.warning({
                    title: 'Verifique',
                    message: 'Por favor, ingrese su Provincia/Estado',
                    progressBarColor: 'rgb(0, 255, 184)',
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
                this.awaitChange = false;
                return;
            }
            if (!this.city) {
                iziToast.warning({
                    title: 'Verifique',
                    message: 'Por favor, ingrese su Ciudad',
                    progressBarColor: 'rgb(0, 255, 184)',
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
                this.awaitChange = false;
                return;
            }
            this.pleaseAwait();
            await axios.post(this.url + '/incluyeme-login-extension/include/verifications/register.php', {
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
            this.awaitChange = false;
            this.currentStep = step;
        },
        confirmStep7: async function (step) {
            if (!this.moreDis) {
                iziToast.warning({
                    title: 'Verifique',
                    message: 'Por favor, cuentenos sobre su disCapacidad',
                    progressBarColor: 'rgb(0, 255, 184)',
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
            const data = new FormData();
            if (this.image !== null || this.cud !== null || this.cv !== null) {
                if (this.image !== null) {
                    data.append('img_path', this.image);
                }
                if (this.cud !== null) {
                    data.append('cud', this.cud);
                }
                if (this.cv !== null) {
                    data.append('cv', this.cv);
                }
                data.append('files', '1');
                data.append('userID', this.userID);
                this.pleaseAwait();
                await axios.post(this.url + '/incluyeme-login-extension/include/verifications/register.php', data)
                    .then(function (response) {
                        return response
                    })
                    .catch(function (error) {
                        return true;
                    });
            }
            this.awaitChange = false;
            this.currentStep = step;
        },
        confirmStep9: async function (step) {
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
            this.pleaseAwait();
            await axios.post(this.url + '/incluyeme-login-extension/include/verifications/register.php', {
                userID: this.userID,
                idioms: this.idioms,
                oLevel: this.oralLevel,
                wLevel: this.redLevel,
                sLevel: this.lecLevel
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
        pleaseAwait: function () {
            iziToast.info({
                title: 'Confirmando',
                message: 'Estamos verificando su informacion, por favor espere.',
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
    }
});
