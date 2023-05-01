<script setup>
import PrimaryButton from '@/Components/PrimaryButton.vue';
import Container from '@/Components/Container.vue';
import Card from '@/Components/Card.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    articles: Array
})
</script>

<template>
    <Head title="Articles" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between items-center">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Articles</h2>
                <Link href="/articles/create">
                    <PrimaryButton>Create</PrimaryButton>
                </Link>
            </div>
        </template>

        <div class="py-12">
            <Container class="space-y-6">
                <Card v-for="article in articles">
                    <h2 class="text-2xl font-semibold mb-2">
                        {{ article.title }}
                    </h2>
                    <p>{{ article.content }}</p>
                </Card>
            </Container>
        </div>
    </AuthenticatedLayout>
</template>
