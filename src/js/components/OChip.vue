<template>
    <span
        class="py-1.4 px-2.5 text-xxs rounded-1.8 inline-block
            whitespace-nowrap text-center align-baseline font-bold uppercase leading-none
            text-white"
        :class="[
            color == 'blue' ? 'bg-gradient-to-tl from-blue-500 to-violet-500' : '',
            color == 'red' ? 'bg-gradient-to-tl from-red-500 to-purple-500' : '',
            color == 'green' ? 'bg-gradient-to-tl from-green-500 to-emerald-500' : '',
            color == 'yellow' ? 'bg-gradient-to-tl from-yellow-500 to-orange-500' : '',
            color == 'teal' ? 'bg-gradient-to-tl from-teal-600 to-cyan-600' : '',
            color == 'purple' ? 'bg-gradient-to-tl from-purple-500 to-pink-500' : '',
        ]"
    >
        <slot></slot>
    </span>
</template>

<script>
export default {
    name: 'OChip',
    props: {
        color: {
            type: String,
            default: 'blue'
        }
    }
}
</script>