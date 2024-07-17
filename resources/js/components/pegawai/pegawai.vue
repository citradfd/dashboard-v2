<template>
    <div>
        <div v-if="showSuccessAlert" class="alert alert-primary alert-dismissible fade show" role="alert">
            <strong>{{ alertMessage }}</strong>.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <div class="mb-3 col-4">
            <input type="text" class="form-control" v-model="filter" placeholder="Search Objective">
        </div>
        
        <b-table bordered striped hover :items="filteredItems" :fields="fields" :per-page="perPage" :current-page="currentPage">
            <template v-slot:cell(no)="data">
                {{ (currentPage - 1) * perPage + (data.index + 1) }}
            </template>

            <template v-slot:cell(id_departemen)="data">
                {{ data.item.keterangan_departemen }}
            </template>

            <template v-slot:cell(actions)="data">
                <a :href="$root.baseurl+`/indicator/edit/${data.item.idindicator}`" class="btn btn-primary btn-sm">
                    <font-awesome-icon icon="fa-pencil" />
                </a>
                <button class="btn btn-danger btn-sm" @click="deleteItem(data.item.idindicator)">
                    <font-awesome-icon icon="fa-trash" />
                </button>        
            </template>
        </b-table>

        <b-pagination v-model="currentPage" :total-rows="totalRows" :per-page="perPage" align="right"></b-pagination>
    </div>
</template>

<script>
import axios from 'axios';
import { BTable, BPagination } from 'bootstrap-vue';
import ToggleButton from 'vue-js-toggle-button';
Vue.use(ToggleButton);

export default {
    components: { BTable, BPagination },
    data () {
        return {
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            fields: [
                { key: 'no', label: 'No', thStyle: { 'text-align': 'center' } },
                { key: 'Nama', label: 'Nama Pegawai' },
                { key: 'NIK', label: 'NIK Pegawai' },
                { key: 'id_departemen', label: 'Departemen' },
                { key: 'tgl_lahir', label: 'Tanggal Lahir' },
                { key: 'alamat', label: 'Alamat' },
                { key: 'actions', label: 'Actions', tdClass: 'text-center', thClass: 'text-center' },                                                              
            ],
            items: [],
            filter: '', // Properti untuk menyimpan teks pencarian
            currentPage: 1,
            perPage: 10,
            totalRows: 0,
            showSuccessAlert: false,
            alertMessage: '',
            departemen: {
                1: 'Keuangan',
                2: 'HR',
                3: 'IT'
            }
        }
    },

    mounted() {
        this.fetchData();
    },

    computed: {
        filteredItems() {
            // Lakukan filtering berdasarkan teks pencarian
            if (this.filter) {
                return this.items.filter(item => {
                    return (
                        item.point.toLowerCase().includes(this.filter.toLowerCase())
                    );
                });
            } else {
                return this.items.map(item => ({
                    ...item,
                    keterangan_departemen: this.departemen[item.id_departemen] || 'Unknown'
                }));
            }
        }
    },

    methods: {
        updateStatus(item) {         
            if (item.aktif === 1) {
                if (confirm('Yakin mau Menonaktifkan account ini?')) {                                    
                    const formData = new FormData();
                    formData.append('_token', this.csrf);
                    formData.append('id', item.id);
                    axios
                    .post('/tutor/nonaktifkan', formData, {
                        headers: {
                            'Content-Type': 'multipart/form-data',                        
                        },
                    })
                    .then(response => {                            
                        item.aktif = 0;
                    })
                    .catch(error => {
                        console.log(error);
                    });
                }
            } else {                
                if (confirm('Yakin mau Mengaktifkan account ini?')) {                                    
                    const formData = new FormData();
                    formData.append('_token', this.csrf);
                    formData.append('id', item.id);
                    axios
                    .post('/tutor/aktifkan', formData, {
                        headers: {
                            'Content-Type': 'multipart/form-data',                        
                        },
                    })
                    .then(response => {                            
                        item.aktif = 1;
                    })
                    .catch(error => {
                        console.log(error);
                    });
                }
            }              
        },
        fetchData() {
            axios.get(this.$root.baseurl + '/pegawai/getdata').then(response => {
                this.items = response.data;
                this.totalrows = response.data.length;
            });
        },
        deleteItem(idindicator) {
            if (confirm('Yakin mau menghapus data ini?')) {
                axios
                .delete(this.$root.baseurl + `/indicator/delete/${idindicator}`, {
                    headers: {
                        '_token': this.csrf
                    }
                })
                .then(response => {
                    console.log(response.data);
                    this.fetchData();
                    this.showSuccessAlert = true;
                    this.alertMessage = 'Data Telah di Dihapus';
                    setTimeout(() => {
                        this.showSuccessAlert = false;
                    }, 3000);
                })
                .catch(error => {
                    console.log(error);
                });
            }
        },
    }
}
</script>