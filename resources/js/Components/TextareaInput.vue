<script setup>
import { useTextareaAutosize } from '@vueuse/core';
import { onMounted, watch } from 'vue';

const { textarea, input } = useTextareaAutosize()

const props = defineProps(['modelValue']);
const emit = defineEmits(['update:modelValue']);

watch(() => props.modelValue, () => {
    input.value = props.modelValue;
})

watch(input, () => {
    emit('update:modelValue', input.value);
})

onMounted(() => {
    input.value = props.modelValue;
    if (textarea.value.hasAttribute('autofocus')) {
        textarea.value.focus();
    }
});

defineExpose({ focus: () => textarea.value.focus() });
</script>

<template>
    <textarea
        class="border-gray-300 dark:border-gray-700 overflow-hidden dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
        v-model="input"
        ref="textarea"
    ></textarea>
</template>