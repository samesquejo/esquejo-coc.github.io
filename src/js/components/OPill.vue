<template>
    <div
        class="text-base flex items-center border border-2  px-3 py-1 rounded-full"
        :class="{
            'border-lime-400 text-lime-400': color == 'lime',
            'border-yellow-400 text-yellow-400': color == 'yellow',
            'border-red-400 text-red-400': color == 'red',
            'border-orange-400 text-orange-400': color == 'orange',
            'border-emerald-400 text-emerald-400': color == 'emerald',
            'border-teal-400 text-teal-400': color == 'teal',
            'border-purple-400 text-purple-400': color == 'purple',
            'border-violet-400 text-violet-400': color == 'violet',
            'border-pink-400 text-pink-400': color == 'pink',
            'border-indigo-400 text-indigo-400': color == 'indigo',
            'text-base': size == 'base',
            'text-sm': size == 'sm',
        }"
    >
        <slot />
    </div>
</template>

<script>
export default {
    name: 'OPill',
    props: {
        color: {
            type: String,
            default: 'lime'
        },
        size: {
            type: String,
            default: 'base'
        }
    }
}
</script>