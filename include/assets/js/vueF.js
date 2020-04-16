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
var app = new Vue({
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
        vObservar: null,
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
        motriz: false

    },
    ready: function() {
        console.log('ready');
    },
    methods: {
        goToStep: function(step) {
            this.currentStep = step;
        }
    }
});
