<template>
    <button
        type="button"
        class="inline-block font-bold text-center uppercase align-middle transition-all rounded-lg cursor-pointer
            leading-normal text-xs ease-in tracking-tight-rem bg-150 bg-x-25 
            disabled:opacity-75 disabled:cursor-not-allowed disabled:hover:opacity-75"
        :class="styleSetup()"
        
    >
        <slot></slot>
    </button>
</template>

<script>
export default {
    name: 'OButton',
    props: {
        color: {
            type: String,
            default: 'primary'
        },
        mode: {
            type: String,
            default: ''
        },
        isIcon: {
            type: Boolean,
            default: false
        },
        size: {
            type: String,
            default: 'md'
        }
    },
    data: () => ({
        icon: [
            'text-xl',
        ],
        primary: {
            default: [
                'text-emerald-400',
                'bg-blue-500/0',
                'hover:bg-emerald-600/100 hover:text-white',
                'active:bg-emerald/100',
                'border border-emerald-500',
            ],
            fill: [
                'text-white',
                'bg-blue-500',
                'hover:bg-blue-500/100',
                'active:bg-blue/100'
            ],
            gradient: [
                'text-white',
                'bg-gradient-to-tl',
                'from-blue-500',
                'to-violet-500'
            ]
        },
        danger: {
            default: [
                'text-red-600',
                'bg-red-600/0',
                'hover:bg-red-600/25',
                'active:bg-red/45'
            ],
            fill: [
                'text-white',
                '!bg-red-600',
                '!hover:bg-red-500/100',
                'active:bg-red/100'
            ],
            gradient: [
                'text-white',
                'bg-gradient-to-tl',
                'from-red-600',
                'to-orange-600'
            ],
        },
        sizes: {
            md: ['px-6', 'py-3'],
            sm: ['px-3', 'py-1.5'],
        }
    }),
    methods: {
        styleSetup() {
            let styleResponse = [];
            let styleColor = {};
            switch (this.color) {
                case 'primary':
                    styleColor = this.primary;
                    break;
                case 'danger':
                    styleColor = this.danger;
                    break;
            }
            if (this.mode == 'fill') {
                delete styleColor.gradient;
            } else if (this.mode == 'gradient'){
                delete styleColor.fill;
            } else {
                delete styleColor.gradient;
                delete styleColor.fill;
            }
            for (let key in styleColor) {
                styleResponse = [
                    ...styleResponse,
                    ...styleColor[key]
                ];
            }
            if (this.isIcon) {
                styleResponse = [
                    ...this.icon,
                    ...styleResponse,
                ]
            }
            styleResponse = [
                ...this.sizes[this.size],
                ...styleResponse
            ]
            return styleResponse;
        }
    }
}
</script>