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
        dateBirthDay: null,
        disCap: null,
        disClass: 'w-100',
        mPhone: null,
        country: null,
        dateStudiesD: [],
        dateStudieB: [],
        titleEdu: [],
        eduLevel: [],
        formFields: [],
        phone: null,
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
        vObserlet: null,
        vTemp: null,
        universities: [],
        vColores: null,
        vDPlanos: null,
        vTecniA: null,
        inteEscri: null,
        inteTransla: null,
        inteTarea: null,
        inteActividad: null,
        inteMolesto: null,
        inteTrabajar: null,
        inteTrabajarSolo: null,
        moreDis: null,
        dateBirthDay: null,
        psiquica: false,
        habla: false,
        intelectual: false,
        visceral: false,
        visual: false,
        city: null,
        auditiva: false,
        motriz: false,
        image: null,
        img: null,
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
        study: []
    },
    ready: function () {
        console.log('ready');
    },
    methods: {
        goToStep: async function (step, url = false) {
            this.url = url;
            switch (step) {
                case 2:
                    await this.confirmStep2(step);
                    break;
                case 3:
                    await this.confirmStep3(step);
                    break;
                case 4:
                    await this.getCountries();
                    await this.confirmStep4(step);
                    break;
                case 5:
                    await this.confirmStep5(step);
                    break;
                case 7:
                    await this.confirmStep7(step);
                    break;
                case 8:
                    this.getCountries();
                    this.getStudies();
                    await this.confirmStep8(step);
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
                document.getElementById("cargaImg").value = "";
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
            if (!this.isValidEmail(this.email) || this.password === null || !this.password) {
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
                return;
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
                return;
            }
            this.currentStep = step;
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
                return;
            }
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
                return;
            }
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
                return;
            }
            if (!this.country) {
                iziToast.warning({
                    title: 'Verifique',
                    message: 'Por favor, ingrese su pais',
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
                return;
            }
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
            await this.drop();
            this.dropzone();
        },
        confirmStep8: async function (step) {
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
        addStudies: async function () {
            this.formFields.push(1);
        }
    }
});
