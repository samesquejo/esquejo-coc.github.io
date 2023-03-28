<template>
    <div class="rounded-t mb-0 px-4 py-5 border-0">
        <div class="flex flex-wrap items-center">
            <div class="relative w-full max-w-full flex-grow flex-1" :class="[!lessPad ? 'px-4' : '']">
                <slot />
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'TablePanelHeader',
    props: {
        lessPad: {
            type: Boolean,
            default: false
        }
    }
}
</script>