<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">What is this all about?</div>
                    <div class="card-body">
                        <p>This is a simple version of the logical game "Buls & Cows", if you are not familliar with the rules you can do it by clicking
                             <a href="https://en.wikipedia.org/wiki/Bulls_and_Cows" target="_blank" rel="noopener noreferrer">here</a>
                        </p>
                    </div>
                </div>

                <div class="card mt-10" v-if="show_number_card">
                    <div class="card-header">What number do you have in mind...</div>
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
                                v-model="user_input_number[0].value"
                            />
                            <span class="w-2 py-0.5 bg-gray-400" />

                            <input
                                type="number"
                                class="w-10 h-10 border-2 rounded 
                                outline-none text-center 
                                font-semibold text-xl spin-button-none 
                                border-gray-200 focus:border-gray-700 
                                focus:text-gray-700 text-black transition"
                                v-model="user_input_number[1].value"

                            />
                            <span class="w-2 py-0.5 bg-gray-400" />

                            <input
                                type="number"
                                class="w-10 h-10 border-2 rounded 
                                outline-none text-center 
                                font-semibold text-xl spin-button-none 
                                border-gray-200 focus:border-gray-700 
                                focus:text-gray-700 text-black transition"
                                v-model="user_input_number[2].value"

                            />
                            <span class="w-2 py-0.5 bg-gray-400" />

                            <input
                                type="number"
                                class="w-10 h-10 border-2 rounded 
                                outline-none text-center 
                                font-semibold text-xl spin-button-none 
                                border-gray-200 focus:border-gray-700 
                                focus:text-gray-700 text-black transition"
                                v-model="user_input_number[3].value"
                            />
                        </div>
                            <button type="submit" 
                                class="btn btn-primary bg-blue-700 position-center"
                                @click="save"
                            >
                                Save
                            </button>
                    </div>
                </div>

                <div class="card mt-10" v-if="show_guesses_card">
                    <!-- <div class="absolute top-0 left-0 px-6 py-7 bg-gray-200">
                        <h4 class="mb-3 text-xl font-semibold tracking-tight text-black">This is the title</h4>
                        <p class="leading-normal text-black z-20">Lorem ipsum dolor, sit amet cons ectetur adipis icing elit. Praesen tium, quibusdam facere quo laborum maiores sequi nam tenetur laud.</p>
                    </div> -->
                    <div class="card-header">Make your guess...</div>
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
                                v-model="user_input_guesess[0].value"
                            />
                            <span class="w-2 py-0.5 bg-gray-400" />

                            <input
                                type="number"
                                class="w-10 h-10 border-2 rounded 
                                outline-none text-center 
                                font-semibold text-xl spin-button-none 
                                border-gray-200 focus:border-gray-700 
                                focus:text-gray-700 text-black transition"
                                v-model="user_input_guesess[1].value"

                            />
                            <span class="w-2 py-0.5 bg-gray-400" />

                            <input
                                type="number"
                                class="w-10 h-10 border-2 rounded 
                                outline-none text-center 
                                font-semibold text-xl spin-button-none 
                                border-gray-200 focus:border-gray-700 
                                focus:text-gray-700 text-black transition"
                                v-model="user_input_guesess[2].value"
                            />
                            <span class="w-2 py-0.5 bg-gray-400" />

                            <input
                                type="number"
                                class="w-10 h-10 border-2 rounded 
                                outline-none text-center 
                                font-semibold text-xl spin-button-none 
                                border-gray-200 focus:border-gray-700 
                                focus:text-gray-700 text-black transition"
                                v-model="user_input_guesess[3].value"
                            />
                        </div>
                            <button type="submit" 
                                class="btn btn-primary bg-blue-700 position-center"
                                @click="saveScore"
                            >
                                Next
                            </button>
                    </div>
                </div>
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert" v-if="show_error_message">
                        <strong class="font-bold">An error occured</strong>
                        <span class="block sm:inline">{{error_message}}</span>
                        <span class="absolute top-0 bottom-0 right-0 px-4 py-3" @click="show_error_message = false">
                            <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                        </span>
                    </div>

                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert" v-if="show_success_message">
                        <strong class="font-bold">Success</strong>
                        <span class="block sm:inline">{{success_message}}</span>
                        <span class="absolute top-0 bottom-0 right-0 px-4 py-3" @click="show_success_message = false">
                            <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                        </span>
                    </div>

                <div class="card mt-10">
                    <div class="card-header">How is going for you?</div>
                    <div class="card-body">
                        <div class="flex">
                            <img src="/images/bull-icon.png" alt="" height="70px" width="70px">
                            <span class="py-3 -px-2">: {{found_bulls_user}}</span>
                        </div>
                        <div class="flex">
                            <img class="ml-3" src="/images/cow-icon.png" alt="" height="50px" width="50px">
                            <span class="pt-3">: {{found_cows_user}}</span>
                        </div>
                        <!-- <p>Found Cows: {{found_cows}}</p> -->
                        <p>Guessed Digits: <strong>{{guessed_digits_user_count}} / 4</strong></p>
                        <span>What you found so far:</span>
                        <span v-for="(digit, index) in guessed_digits_user" :key="index">{{ digit }} </span>
                    </div>
                </div>

                 <div class="card mt-10">
                    <div class="card-header">How is going for the other guy?</div>
                    <div class="card-body">
                        <div class="flex">
                            <img src="/images/bull-icon.png" alt="" height="70px" width="70px">
                            <span class="py-3 -px-2">: {{found_bulls}}</span>
                        </div>
                        <div class="flex">
                            <img class="ml-3" src="/images/cow-icon.png" alt="" height="50px" width="50px">
                            <span class="pt-3">: {{found_cows}}</span>
                        </div>
                        <!-- <p>Found Cows: {{found_cows}}</p> -->
                        <p>Guessed Digits: <strong>{{guessed_digits_count}} / 4</strong></p>
                        <span>What you found so far: </span>
                        <span v-for="(digit, index) in guessed_digits" :key="index">{{ digit }} </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

    export default {
        mounted() {
            this.generateDigits(this.generated_digits);
            this.generateDigits(this.generated_digits_user);
        },

        watch: {
            'user_input_guesess': {
                handler: function (val, oldVal) {
                    if(this.current_turn === 'player' && val.every(el => el.value !== null)){
                        this.checkForGuessedDigits(this.generated_digits, this.user_input_guesess);
                    }
                },
                deep: true
            },

            'guessed_digits_user': {
                handler: function (val, oldVal) {
                    console.log(val.length == 4, this.guessed_digits.length < 4, this.current_turn === 'player')
                    if(val.length == 4 && this.guessed_digits.length < 4 && this.current_turn === 'player'){
                        alert('Player wins')
                    }
                    
                    if(val.length < 4 && this.guessed_digits.length == 4 && this.current_turn === 'AI'){
                        alert('AI wins')
                    }
                },
            },
        },

        data(){
            return {
                user_input_guesess: [
                    {
                        position: 0,
                        value: null
                    },
                    {
                        position: 1,
                        value: null
                    },
                    {
                        position: 2,
                        value: null
                    },
                    {
                        position: 3,
                        value: null
                    },
                ],
                user_input_number: [
                    {
                        position: 0,
                        value: null
                    },
                    {
                        position: 1,
                        value: null
                    },
                    {
                        position: 2,
                        value: null
                    },
                    {
                        position: 3,
                        value: null
                    },
                ],
                generated_digits: [],
                generated_digits_user: [],
                found_bulls: 0,
                found_cows: 0,
                found_bulls_user: 0,
                found_cows_user: 0,
                guessed_digits_user_count: 0,
                guessed_digits_user: [],
                guessed_digits_count: 0,
                guessed_digits: [],
                generated_gueses: [],
                success_message: null,
                show_success_message: false,
                error_message: null,
                show_error_message: false,
                show_number_card: true,
                show_guesses_card: false,
                current_turn: 'player'
            }
        },

        methods:{
            generateDigits(array){
                while(array.length < 4){
                    let digit = Math.floor(Math.random() * 10) + 1;
                    if(array.indexOf(digit) === -1 && digit <= 9){
                        if(digit == 4 || digit == 5){
                            this.changePosition(array, digit, array.length)
                        }
                        array.push(digit);
                    } 
                }
            },

            checkForGuessedDigits(generated_array, input_array, is_user_input=true){
                // Check if the generated digits array contains user input
                axios.post('/digits/found', {
                    'generated_array': generated_array,
                    'input_array': input_array
                })
                .then(response => {
                    if(is_user_input){
                        this.found_bulls_user = response.data['found_bulls'];
                        this.found_cows_user = response.data['found_cows'];
                        this.guessed_digits_user_count = response.data['guessed_digits_count'];
                        this.guessed_digits_user = response.data['guessed_digits'];
                        this.moveDigits(this.user_input_guesess);
                        this.current_turn = 'AI';
                    }else{
                        this.found_bulls = response.data['found_bulls'];
                        this.found_cows = response.data['found_cows'];
                        this.guessed_digits_count = response.data['guessed_digits_count'];
                        this.guessed_digits = response.data['guessed_digits'];
                        this.current_turn = 'player';
                    }
                    this.checkForWinner()
                })
                .catch(err => {
                    console.log(err)
                })
            },

            moveDigits(array, is_user_input=true){
                let input_digit_one = array.find(d => d.value == 1);
                let input_digit_eigth = array.find(d => d.value == 8);

                if(input_digit_one && input_digit_eigth){
                    axios.post('/restrictions/swap', {
                        'input_array': array
                    })
                    .then(response => {
                        if(is_user_input){
                            this.user_input_guesess = response.data;
                        }else{
                            this.generated_gueses = response.data;
                        }
                    })
                    .catch(err => {
                        console.log(err)
                    })
                }
            },

            changePosition(array, input, position){
                axios.post('/restrictions/move', {
                    'array': array,
                    'digit': input,
                    'position': position
                })
                .then(response => {
                    console.log(response.data)
                })
            },

            saveScore(){
                axios.post('/score', {
                    'bulls_found': this.found_bulls,
                    'cows_found': this.found_cows,
                    'full_numbers_found': this.guessed_digits_count
                })
                .then(response => {
                    this.user_input_guesess = [
                    {
                        position: 0,
                        value: null
                    },
                    {
                        position: 1,
                        value: null
                    },
                    {
                        position: 2,
                        value: null
                    },
                    {
                        position: 3,
                        value: null
                    },
                ];
                    this.current_turn = 'AI';
                    this.show_success_message = true;
                    this.success_message = 'Your score, was stored successfully!';
                    this.checkForGuessedDigits(this.generated_digits, this.user_input_number, false)
                })
                .catch(err => {
                    this.show_error_message = true;
                    this.error_message = 'Something, went wrong when tryng to save your score';
                    console.log(err)
                })
            },

            save(){
                this.success_message = 'Thank you, your number is saved';
                this.show_success_message = true;
                
                setTimeout(() => {
                    this.show_success_message = false;
                    this.show_number_card = false;
                    this.show_guesses_card = true;
                }, 2000);
            },

            checkForWinner(){
                if(this.guessed_digits_user.length == 4 && this.guessed_digits.length < 4 && this.current_turn === 'player'){
                    alert('Player wins')
                }
                    
                if(this.guessed_digits_user.length < 4 && this.guessed_digits.length == 4 && this.current_turn === 'AI'){
                    alert('AI wins')
                }
            }
        }
    }
</script>