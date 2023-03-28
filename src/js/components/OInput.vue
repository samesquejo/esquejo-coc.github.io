<template>
    <div class="mb-4">
        <label
            for="title"
            class="mb-2 block font-bold"
            v-if="label != ''"
        >
            {{ label }}
        </label>
        <input
            :type="type"
            :placeholder="placeholder"
            class="bg-gray-900 font-normal px-2 py-1 placeholder-blueGray-300 text-white relative rounded text-sm shadow outline-none focus:outline-none focus:shadow-outline w-full"
            :readonly="readonly"
            :value="modelValue"
            @input="updateInput"
        >
    </div>
</template>

<script>
export default {
    name: 'OInput',
    props: {
        type: {
            type: String,
            default: 'text'
        },
        label: {
            type: String,
            default: ''
        },
        placeholder: {
            type: String,
            default: 'Placeholder'
        },
        size: {
            type: String,
            default: 'sm'
        },
        modelValue: {
            type: [String, Number, File],
            default: "",
        },
        readonly: {
            type: Boolean,
            default: false
        }
    },
    methods: {
        updateInput(event) {
            this.$emit("update:modelValue", event.target.value);
        }
    }
}
</script>