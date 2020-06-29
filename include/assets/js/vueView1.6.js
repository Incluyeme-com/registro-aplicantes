/*
 * Copyright (c) 2020
 *
 * Developer by Jesus Nuñez <jesus.nunez2050@gmail.com> .
 */

Vue.config.ignoredElements = ['x-incluyeme', 'fb:login-button']
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
        name: '',
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
        idiomsOther: [],
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
        aFluida: null,
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
        inteTrabajarOP: null,
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
        myCV: null,
        myCUD: null,
        myIMG: null
    },
    ready: function () {
        console.log('ready');
    },
    mounted() {
    },
    methods: {
        setID: async function (userID, url) {
            this.url = url;
            this.userID = userID;
            this.getLevelsIdioms().finally();
            this.getIdioms().finally();
            this.getCountries().finally();
            this.getStudies().finally();
            this.getExperiences().finally();
            this.getPrefersJobs().finally();
            this.pleaseAwait();
            let data = await jQuery.ajax({
                url: this.url + '/incluyeme-login-extension/include/verifications/viewResume.php?user=' + userID,
                type: 'GET',
                dataType: 'json'
            }).done(success => {
                return success;
            });
            const information = data.message.information;
            const works = data.message.work;
            const studies = data.message.education;
            const idioms = data.message.idioms;
            const discap = data.message.discap;
            const assets = data.message.assets;
            this.myCV = assets[2];
            this.myCUD = assets[1];
            this.myIMG = assets[0];
            this.name = data.message.name;
            this.moreDis = information.moreDis;
            this.lastName = data.message.last_name;
            this.mPhone = information.codphonem;
            this.state = information.province;
            this.city = information.city;
            this.fPhone = information.codphonef;
            this.fiPhone = information.phonef;
            this.street = information.street;
            this.genre = information.genre;
            this.dateBirthDay = information.birthday;
            this.phone = information.phonem;
            this.preferJobs = information.preferjob_id;
            for (let i = 0; i < works.length; i++) {
                try {
                    const stringChange = this.breakStringWork(works[i].detail_description)
                    this.jobsDescript.push(stringChange[2]);
                    Vue.set(app.levelExperience, i, stringChange[0])
                    Vue.set(app.areaEmployed, i, stringChange[1])
                } catch (e) {
                    this.jobsDescript.push(works[i].detail_description);
                }
                this.employed.push(works[i].grantor);
                this.jobs.push(works[i].detail_title);
                this.actuWork.push(works[i].is_current == 1);
                this.dateStudiesDLaboral.push(works[i].started_at);
                this.dateStudiesHLaboral.push(works[i.completed_at]);

                this.formFields2.push(i + 1);
            }
            for (let i = 0; i < studies.length; i++) {
                try {
                    const stringChange = this.breakString(studies[i].detail_description)
                    this.studies.push(stringChange[1]);
                    Vue.set(app.eduLevel, i, stringChange[0])
                    Vue.set(app.country_edu, i, stringChange[2].trim())

                } catch (e) {

                }
                this.university_edu.push(studies[i].grantor);
                this.titleEdu.push(studies[i].detail_title);
                this.dateStudieB.push(studies[i].is_current == 1);
                this.dateStudiesD.push(studies[i].started_at);
                this.dateStudiesH.push(studies[i.completed_at]);

                this.formFields.push(i + 1);
            }
            for (let i = 0; i < idioms.length; i++) {
                this.idioms[i] = idioms[i].idioms_id;
                this.lecLevel[i] = idioms[i].slevel;
                this.redLevel[i] = idioms[i].wlevel;
                this.oralLevel[i] = idioms[i].olevel;
                this.formFields3[i] = i + 1;
            }
            discap.map(disabilities => {
                if (disabilities.id == 1 && !this.motriz) {
                    this.motriz = true;
                }
                if (disabilities.id == 2 && !this.auditiva) {
                    this.auditiva = true;
                }
                if (disabilities.id == 3 && !this.visual) {
                    this.visual = true;
                }
                if (disabilities.id == 4 && !this.visceral) {
                    this.visceral = true;
                }
                if (disabilities.id == 5 && !this.intelectual) {
                    this.intelectual = true;
                }
                if (disabilities.id == 6 && !this.psiquica) {
                    this.psiquica = true;
                }
                if (disabilities.id == 7 && !this.habla) {
                    this.habla = true;
                }

                if (disabilities.question_id == 1) {
                    this.mPie = disabilities.answer;
                } else if (disabilities.question_id == 2) {
                    this.mSen = disabilities.answer;
                } else if (disabilities.question_id == 3) {
                    this.mEsca = disabilities.answer;
                } else if (disabilities.question_id == 4) {
                    this.mBrazo = disabilities.answer;
                } else if (disabilities.question_id == 5) {
                    this.peso = disabilities.answer;
                } else if (disabilities.question_id == 6) {
                    this.mRueda = disabilities.answer;
                } else if (disabilities.question_id == 7) {
                    this.mPie = disabilities.answer;
                } else if (disabilities.question_id == 8) {
                    this.mDigi = disabilities.answer;
                } else if (disabilities.question_id == 9) {
                    this.aAmbient = disabilities.answer;
                } else if (disabilities.question_id == 10) {
                    this.aOral = disabilities.answer;
                } else if (disabilities.question_id == 11) {
                    this.aSennas = disabilities.answer;
                } else if (disabilities.question_id == 12) {
                    this.aLabial = disabilities.answer;
                } else if (disabilities.question_id == 13) {
                    this.aBajo = disabilities.answer;
                } else if (disabilities.question_id == 14) {
                    this.aImplante = disabilities.answer;
                } else if (disabilities.question_id == 15) {
                    this.vLejos = disabilities.answer;
                } else if (disabilities.question_id == 16) {
                    this.vObservar = disabilities.answer;
                } else if (disabilities.question_id == 17) {
                    this.vTecniA = disabilities.answer;
                } else if (disabilities.question_id == 18) {
                    this.vColores = disabilities.answer;
                } else if (disabilities.question_id == 19) {
                    this.vDPlanos = disabilities.answer;
                } else if (disabilities.question_id == 20) {
                    this.vHumedos = disabilities.answer;
                } else if (disabilities.question_id == 21) {
                    this.vTemp = disabilities.answer;
                } else if (disabilities.question_id == 22) {
                    this.vPolvo = disabilities.answer;
                } else if (disabilities.question_id == 23) {
                    this.vCompleta = disabilities.answer;
                } else if (disabilities.question_id == 24) {
                    this.vAdap = disabilities.answer;
                } else if (disabilities.question_id == 25) {
                    this.inteEscri = disabilities.answer;
                } else if (disabilities.question_id == 26) {
                    this.inteTransla = disabilities.answer;
                } else if (disabilities.question_id == 27) {
                    this.inteTarea = disabilities.answer;
                } else if (disabilities.question_id == 28) {
                    this.inteTrabajar = disabilities.answer;
                } else if (disabilities.question_id == 29) {
                    this.inteTrabajarSolo = disabilities.answer;
                } else if (disabilities.question_id == 30) {
                    this.inteMolesto = disabilities.answer;
                } else if (disabilities.question_id == 31) {
                    this.inteActividad = disabilities.answer;
                } else if (disabilities.question_id == 32) {
                    this.aFluida = disabilities.answer;
                } else if (disabilities.question_id == 33) {
                    this.inteTrabajarOP = disabilities.answer;
                }

            })
            jQuery("#incluyeme-login-wpjb :input").prop("disabled", true);
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
        pleaseAwait: function () {
            iziToast.info({
                title: 'Por favor, espere',
                message: 'Estamos buscando su informacion.',
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
        pleaseAwait2: function () {
            iziToast.info({
                title: 'Por favor, espere',
                message: 'Estamos verificando tus datos.',
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
        breakString: function (str) {
            let level = str.split('Nivel: ')

            let area = level[1].split('Area de Estudio:');
            level = area[0];
            area = area[1].split('Pais de estudio:');
            let country = area[1];
            area = area[0];
            return [level, Number(area), country]
        },
        breakStringWork: function (str) {
            let level = str.split('Nivel de Experiencia: ')
            let area = level[1].split('Area de Empleo: ');
            level = area[0];
            area = area[1].split('Descripcion: ');
            let country = area[1];
            area = area[0];
            return [Number(level), Number(area), country]
        }
    }
});
startApp();
