<script setup>
import PrimaryButton from "@/Components/PrimaryButton.vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import Card from "@/Components/Card.vue";
import Container from "@/Components/Container.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import TextareaInput from "@/Components/TextareaInput.vue";
import InputError from "@/Components/InputError.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import { computed } from "vue";

const props = defineProps({
    fields: Array,
});

const form = useForm(
    Object.fromEntries(
        props.fields?.map((field) => [field.name, field.default])
    )
);
</script>

<template>
    <Head title="Articles" />

    <AuthenticatedLayout>
        <template #header>
            <h2
                class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight"
            >
                Articles
            </h2>
        </template>

        <div class="py-12">
            <Container>
                <Card>
                    <div v-for="field in fields" class="mb-6 last:mb-0">
                        <InputLabel :for="field.name" :value="field.label" />

                        <TextInput
                            v-if="field.type === 'text'"
                            :id="field.name"
                            :type="field.type"
                            class="mt-1 block w-full"
                            v-model="form[field.name]"
                            required="field.required"
                        />
                        <TextareaInput
                            v-else-if="field.type === 'textarea'"
                            :id="field.name"
                            :type="field.type"
                            class="mt-1 block w-full"
                            v-model="form[field.name]"
                            required="field.required"
                        >
                        </TextareaInput>

                        <InputError
                            class="mt-2"
                            :message="form.errors[field.name]"
                        />
                    </div>

                    <div class="flex justify-end">
                        <PrimaryButton @click="form.post('/articles')">Save</PrimaryButton>
                    </div>
                </Card>
            </Container>
        </div>
    </AuthenticatedLayout>
</template>
