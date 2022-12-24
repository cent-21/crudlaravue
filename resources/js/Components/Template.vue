<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-3 col-lg-3 p-0 pe-1 ">
                <div class="w-100 sidebar">
                    <div class="text-center py-2">
                        <img src="images/logo.png"  alt="">
                    </div>
                    <div class="bg-green- hstack  px-3">
                        <img src="/images/avatar.png" id="avatar" alt="">
                        <dl class="ms-3 mt-3">
                            <dt class="text-white">Rosine Dupuis</dt>
                            <dd class="text-white mt-2">Sécretaire - Paris</dd>
                        </dl>
                    </div>
                    <a href="" class="px-4 py-2 pt-3 hstack text-decoration-none">
                        <i class="uil uil-home fs-5 text-black"></i>
                        <span class="ms-3 text-black">Tableau de bord</span>
                    </a>
                    <div>
                        <div type="button" class="px-4 py-2 hstack text-decoration-none">
                            <i class="uil uil-folder fs-5 text-black"></i>
                            <span class="ms-3 text-black">Dossier clients</span>
                            <i class="uil uil-angle-right-b fs-5 text-black m-auto"></i>
                        </div>
                    </div>
                    <a href="" class="px-4 py-2 pt-3 hstack text-decoration-none">
                        <i class="uil uil-calendar-alt fs-5 text-black"></i>
                        <span class="ms-3 text-black">Agenda</span>
                    </a>
                    <a href="" class="px-4 py-2 pt-3 hstack text-decoration-none">
                        <i class="uil uil-comparison fs-5 text-black"></i>
                        <span class="ms-3 text-black">Rapport d'activité</span>
                    </a>
                    <a href="" class="px-4 py-2 pt-3 hstack text-decoration-none">
                        <i class="uil uil-bell text-black fs-5"></i>
                        <span class="ms-3 text-black">Notifications</span>
                    </a>
                    <a href="" class="px-4 py-2 pt-3 hstack text-decoration-none">
                        <i class="uil uil-user-square text-black fs-5"></i>
                        <span class="ms-3 text-black">Modifier mon profil</span>
                    </a>
                </div>
            </div>
            <div class="col-xl-9 col-lg-9 content">
                <div class="hstack px-4">
                    <img src="/images/design_image.png" alt="">
                    <div class="hstack ms-auto">
                        <input type="text" placeholder="Rechercher" class="form-control- border rounded bg-light-">
                        <i class="uil uil-search fs-3 ms-1"></i>
                    </div>
                    <i class="uil uil-bell fs-2 ms-auto fw-bold"></i>
                    <i class="uil uil-comment fs-2 ms-auto fw-bold"></i>
                </div>
                <div class="p-4">
                    <slot></slot>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Template",
}
</script>
