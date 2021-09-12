<template>
    <div class="w-full overflow-hidden shadow-lg rounded-2xl">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-white dark:text-gray-400 dark:bg-gray-700">
                        <slot name="col"></slot>
                    </tr>
                </thead>
                <tbody class="bg-white dark:bg-gray-700">
                    <slot name="row"></slot>
                </tbody>
            </table>
        </div>
        <slot name="pagination"></slot>
    </div>
</template>

<script>
export default {

}
</script>

<style>

</style>
