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
        currentStep: 1,
        step1: {
            name: '',
            email: ''
        },
        step2: {
            city: '',
            state: ''
        },
        genre: null,
        name: null,
        email: null,
        password: null,
        lastName: null,
        dateBirthDay: null,
        disCap: null,
        disClass: 'w-100',
        mPhone: null,
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
        psiquica: false,
        habla: false,
        intelectual: false,
        visceral: false,
        visual: false,
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
        cudReader: null

    },
    ready: function() {
        console.log('ready');
    },
    methods: {
        goToStep: async function (step) {
            if (step === 7) {
                await this.drop();
                this.dropzone();
            }
            this.currentStep = step;
        },
        drop: async function () {
            this.currentStep = 7;
        },
        dropzone: function () {

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

    }
});
