<template>
    <div class="row">
        <div class="container mt-4">
        <div v-if="showSuccessAlert" class="alert alert-primary alert-dismissible fade show" role="alert">
            <strong>{{ alertMessage }}</strong>.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>        
        <form @submit.prevent="addcity">     
            <div class="box-body">
                <div class="row">
                    <div class="col-7">
                        <div class="mb-1 pb-3 row">                 
                            <label class="col-sm-3 col-form-label">Objective Name</label>
                            <div class="col-sm-9">
                                <select2-component :options="daftarobjective" v-model="selectedObjective" class="form-select" :class="{ 'is-invalid': errors.idobjective }">
                                    <option value="0">Pilih </option>
                                </select2-component>
                            </div>
                        </div>
                    </div>
                </div> 
                <div class="row">
                    <div class="col-7">
                        <div class="mb-1 pb-3 row">                 
                            <label class="col-sm-3 col-form-label">Indicator Name</label>
                            <div class="col-sm-9">
                                <input id="indicatorname" name="indicatorname" type="text" class="form-control" v-model="indicatorname" :class="{ 'is-invalid': errors.indicatorname }">
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>                                                                                               
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
export default{
    data() {
        return {
            indicatorname:'',
            daftarobjective:[],
            selectedObjective:0,
            idobjective:'',
            errors: {},
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            showSuccessAlert: false,
            alertMessage: '',
        }
    },

    mounted(){
        axios.get(this.$root.baseurl+'/indicator/getobjective')
            .then(response=>{
                this.daftarobjective = response.data.map(item=>({id:item.idperspective, text:item.objectivename}));
            });
    },

    methods: {
        addcity(){
            const formData = new FormData();
                formData.append('indicatorname', this.indicatorname);
                formData.append('idobjective', this.selectedObjective);                                                            
                formData.append('_token', this.csrf);
                axios
                    .post(this.$root.baseurl+'/indicator/savedata', formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data',                        
                    },
                    })
                    .then(response => {
                    this.showSuccessAlert = true;
                    this.alertMessage = 'Data Telah di Simpan';
                    this.nama_city = '';                                                                         
                    this.errors = {};                    
                    setTimeout(() => {
                        this.showSuccessAlert = false;
                    }, 3000);
                    })
                    .catch(error => {
                    if (error.response.status === 422) {
                        this.errors = error.response.data.errors;
                    }
                    });
        }
    }
}
</script>