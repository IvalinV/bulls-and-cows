<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Give us your predictions</div>
                    <div class="card-body">
                        <div class="flex justify-center items-center">
                            <input
                                type="number"
                                min="1"
                                max="10"
                                class="w-10 h-10 border-2 rounded
                                outline-none text-center 
                                font-semibold text-xl spin-button-none 
                                border-gray-200 focus:border-gray-700 
                                focus:text-gray-700 text-black transition"
                                v-model="user_input[0].value"
                                @change="checkForGuessedDigits($event)"
                            />
                            <span class="w-2 py-0.5 bg-gray-400" />

                            <input
                                type="number"
                                class="w-10 h-10 border-2 rounded 
                                outline-none text-center 
                                font-semibold text-xl spin-button-none 
                                border-gray-200 focus:border-gray-700 
                                focus:text-gray-700 text-black transition"
                                v-model="user_input[1].value"
                                @change="checkForGuessedDigits($event)"

                            />
                            <span class="w-2 py-0.5 bg-gray-400" />

                            <input
                                type="number"
                                class="w-10 h-10 border-2 rounded 
                                outline-none text-center 
                                font-semibold text-xl spin-button-none 
                                border-gray-200 focus:border-gray-700 
                                focus:text-gray-700 text-black transition"
                                v-model="user_input[2].value"
                                @change="checkForGuessedDigits($event)"

                            />
                            <span class="w-2 py-0.5 bg-gray-400" />

                            <input
                                type="number"
                                class="w-10 h-10 border-2 rounded 
                                outline-none text-center 
                                font-semibold text-xl spin-button-none 
                                border-gray-200 focus:border-gray-700 
                                focus:text-gray-700 text-black transition"
                                v-model="user_input[3].value"
                                @change="checkForGuessedDigits($event)"
                            />
                        </div>
                    </div>
                </div>

                <div class="card" v-if="false">
                    <div class="card-header">Give us your predictions</div>
                    <div class="card-body">
                        <div class="flex justify-center items-center">
                            <input
                                type="number"
                                class="w-10 h-10 border-2 rounded
                                outline-none text-center 
                                font-semibold text-xl spin-button-none 
                                border-gray-200 focus:border-gray-700 
                                focus:text-gray-700 text-black transition"
                            />
                            <span class="w-2 py-0.5 bg-gray-400" />

                            <input
                                type="number"
                                class="w-10 h-10 border-2 rounded 
                                outline-none text-center 
                                font-semibold text-xl spin-button-none 
                                border-gray-200 focus:border-gray-700 
                                focus:text-gray-700 text-black transition"
                            />
                            <span class="w-2 py-0.5 bg-gray-400" />

                            <input
                                type="number"
                                class="w-10 h-10 border-2 rounded 
                                outline-none text-center 
                                font-semibold text-xl spin-button-none 
                                border-gray-200 focus:border-gray-700 
                                focus:text-gray-700 text-black transition"
                            />
                            <span class="w-2 py-0.5 bg-gray-400" />

                            <input
                                type="number"
                                class="w-10 h-10 border-2 rounded 
                                outline-none text-center 
                                font-semibold text-xl spin-button-none 
                                border-gray-200 focus:border-gray-700 
                                focus:text-gray-700 text-black transition"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            this.generateDigits();
        },

        watch: {
             'generated_digits': {
                handler: function (val, oldVal) {
                    this.checkForGuessedDigits(val);
                },
                deep: true
            }
        },

        data(){
            return {
                user_input: [
                    {
                        value: null
                    },
                    {
                        value: null
                    },
                    {
                        value: null
                    },
                    {
                        value: null
                    },
                ],
                generated_digits: [],
                guessed_bulls: 0,
                guessed_cows: 0
            }
        },

        methods:{
            generateDigits(){
                while(this.generated_digits.length < 4){
                    let digit = Math.floor(Math.random() * 10) + 1;
                    if(this.generated_digits.indexOf(digit) === -1 && digit <= 9){
                        this.generated_digits.push(digit);
                    } 
                }
            },

            checkForGuessedDigits(event){
                // Check if the generated digits array contains user input
                let input = event.target.value;
                let found = this.generated_digits.some(digit => digit == input);
                if(found){
                    console.log(input)
                    let found_index = this.user_input.indexOf(input);
                    let actual_index = this.generated_digits.indexOf(input);
                    console.log(actual_index)
                    // If so check the position
                    if(found_index == actual_index){
                        // Increment the number of found bulls
                        this.guessed_bulls++;
                    }else{
                        this.guessed_cows++;
                    }
                }
            },
        }
    }
</script>
