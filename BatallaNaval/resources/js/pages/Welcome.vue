<script setup lang="ts">
import { Head, Link, usePage } from '@inertiajs/vue3';
import { computed } from 'vue';
import { dashboard, login, } from '@/routes';
import { register } from '@/routes';
import logoURL from '@/assets/imagen/logo.png';




const page = usePage();
const dashboardUrl = computed(() =>
    page.props.currentTeam ? dashboard(page.props.currentTeam.slug).url : '/',
);
</script>

<template>
    <div class="base
        w-full h-[100vh]
        flex justify-center
    ">

        <div class="caja_centro
                relative
                flex flex-col justify-center
                h-full w-[55vw]
                bg-(--azul-marino-oscuro)
        ">
            <div class="caja_menu
                relative
                h-[75vh]
                flex flex-col justify-center
            ">
            <div class="w-full h-[30%] flex justify-center">
                <div class="caja_logo
                    relative
                    w-[75%] h-[75%]
                    bg-no-repeat
                    bg-contain
                "
                :style="'background-image:url('+logoURL+')'"
                >
            </div>
                
                </div>

                <div class="caja_menu_principal
                ">
                    <div class="cont_menu_principal">
                        <div class="bt_entrar boton">ENTRAR</div>
                        <div class="bt_registrarse boton">REGISTRARSE</div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    
</template>

<style scoped>
    .caja_logo{
        
        background-size: contain;
        background-repeat: no-repeat;
    }


.boton:hover{
    box-shadow: 2px 2px 2px black;
    cursor: pointer;
}

.boton:active{
    box-shadow: 0px 0px 0px black;
}

.boton{
    display: inherit;
    position: relative;
    font-weight: bold;
    font-size: 30px;
    top: 30px;
    /*float: left;
    left: 30%;*/
    right: auto;
    margin-top: 20px;
    left:calc(50% - 110px);
    width: 200px;
    text-align: center;
    padding-left: 10px;
    padding-right: 10px;
    padding-top: 5px;
    border: #e08e09 2px solid;
    border-radius: 10px;
    color: #edba68;
    background-color: #001f63;
}
</style>
