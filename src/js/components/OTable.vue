<template>
    <div class="block w-full overflow-x-auto">
        <table class="items-center w-full bg-transparent border-collapse">
            <slot />
        </table>
    </div>
</template>

<script>
export default {
    name: 'OTable'
}
</script>