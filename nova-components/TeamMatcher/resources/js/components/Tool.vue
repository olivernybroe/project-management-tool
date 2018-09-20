<template>
    <div>
        <loading-view :loading="loading">
            <div class="card mb-6 relative" v-if="!loading && skills && skills.length">
                <div class="overflow-hidden overflow-x-auto relative">
                    <table cellpadding="0" cellspacing="0" data-testid="resource-table" class="table w-full">
                        <thead>
                        <tr>
                            <th class="text-left"><span class="cursor-pointer inline-flex items-center">Id</span></th>
                            <th class="text-left"><span class="cursor-pointer inline-flex items-center">Name</span></th>
                            <th class="text-left"><span class="cursor-pointer inline-flex items-center">Current coverage</span></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="item in skills">
                            <td><span class="whitespace-no-wrap text-left">
                                {{item.id}}
                            </span></td>
                            <td><span class="whitespace-no-wrap text-left">
                                {{item.name}}
                            </span></td>
                            <td><span class="whitespace-no-wrap text-left">
                                {{item.coverage || 0}}
                            </span></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>


            <div class="card mb-6 relative" v-if="!loading && resources && resources.length">
                <div class="overflow-hidden overflow-x-auto relative">
                    <table cellpadding="0" cellspacing="0" data-testid="resource-table" class="table w-full">
                        <thead>
                        <tr>
                            <th class="text-left"><span class="cursor-pointer inline-flex items-center">Id</span></th>
                            <th class="text-left"><span class="cursor-pointer inline-flex items-center">Name</span></th>
                            <th class="text-left"><span class="cursor-pointer inline-flex items-center">Score</span></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="item in resources">
                            <td><span class="whitespace-no-wrap text-left">
                                {{item.id}}
                            </span></td>
                            <td><span class="whitespace-no-wrap text-left">
                                {{item.name}}
                            </span></td>
                            <td><span class="whitespace-no-wrap text-left">
                                {{item.possibleCoverage}}
                            </span></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </loading-view>
        <div class="card mb-6 py-3 px-6" v-if="!loading && !resources.length">
            <p class="text-90">No teammates is a good match.</p>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['resourceName', 'resourceId', 'field'],

        data() {
            return {
                loading: true,
                resources: [],
            }
        },

        computed: {
            basePath() {
                return '/nova-vendor/team-matcher'
            },
            matchesPath() {
                return `${this.basePath}/matches/${this.resourceId}`
            }
        },

        mounted() {
            this.loadUserData();
        },

        methods: {
            loadUserData(){
                Nova.request()
                    .get(this.matchesPath)
                    .then(response => {

                        this.resources = response.data.employees;
                        this.skills = response.data.skillSatisfaction;
                        this.loading = false;
                        console.log(this.resources, this.resources.length)
                    })
            },
        }
    }
</script>
