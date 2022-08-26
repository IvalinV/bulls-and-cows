<template>
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
                        />
                    </div>
</template>

<script>
export default {
    
}
</script>