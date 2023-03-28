<template>
    <div class="rounded-t mb-0 px-4 py-5 border-0">
        <div class="flex flex-wrap items-center">
            <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                <slot />
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'TablePanelHeader'
}
</script>