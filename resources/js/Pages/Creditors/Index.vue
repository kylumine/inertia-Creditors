<script setup>
import { defineProps } from 'vue';
import HeaderBar from '@/Components/HeaderBar.vue';
import { Link, useForm } from '@inertiajs/vue3';

const props = defineProps({
  creditor: Object,
});

const form = useForm({
  last_name: props.creditor.last_name,
  first_name: props.creditor.first_name,
  gender: props.creditor.gender,
  birthdate: props.creditor.birth_date,
  phone: props.creditor.phone,
  address: props.creditor.address,
  credit_limit: props.creditor.credit_limit,
});

const submit = () => {
  form.put(`/creditors/${props.creditor.id}`);
};

const delEmp = (creditor) => {
  const del = confirm("Are you sure you want to delete?");
  if (del) {
    form.delete(`/creditors/${creditor.id}`).then(() => {
      $inertia.visit('/creditors', { preserveScroll: true });
    });
  }
};
</script>


<template>
  <div>
    <HeaderBar />

    <div class="flex">
      <h2 class="text-4xl my-3 pink flex-1 m-2">List Of Creditors</h2>
      <Link href='/creditors/create' class="p-2 btn-pink text-white rounded h-50 mt-3 mr-2"> Add Creditors</Link>
    </div>
    

    <div class="m-4">
      <div class="row">
        <div class="col-md-3" v-for="creditor in creditor" :key="creditor.id">
          <div class="card mb-4 w-100 h-[25vh]">
            <div class="card-header">
              <h4 class="card-title mb-0 bold"><strong>{{ creditor.first_name }} {{ creditor.last_name }}</strong></h4>
            </div>
            <div class="card-body">
              <p class="card-text mt-0"><strong>Address:</strong> {{ creditor.address }}</p>
              <p class="card-text mb-0"><strong>Credit Limit:</strong> ${{ creditor.credit_limit }}</p>
            </div>
            <div class="card-foot flex gap-2">
                <div class="mb-[5%] ml-[2%] flex gap-[6px]">
                  <Link :href="'/creditors/' + creditor.id" class='btn-pink btn' preserve-scroll>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                      <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"/>
                      <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7"/>
                    </svg>
                  </Link>

  

                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                      <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                      <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                    </svg>
                  </button>

                  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Update Creditor</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div>
                              <form @submit.prevent="submit">
                                <div class="mb-3">
                                    <label for="last_name">Last Name: </label>
                                    <input type="text" id="last_name" class="w-full" v-model="form.last_name">
                                </div>
                                <div class="mb-3">
                                    <label for="first_name">First Name: </label>
                                    <input type="text" id="first_name" class="w-full" v-model="form.first_name">
                                </div>
                                <div class="mb-3">
                                    <label for="gender"> Gender:</label>
                                    <select name="gender" id="gender" v-model="form.gender" class="form-select w-full">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                                </div>
                                <div class="mb-3">
                                    <label for="birth_date">Birthdate: </label>
                                    <input type="date" id="birth_date" class="w-full" v-model="form.birth_date">
                                </div>
                                <div class="mb-3">
                                    <label for="phone">Phone: </label>
                                    <input type="text" id="phone" class="w-full" v-model="form.phone">
                                </div>
                                <div class="mb-3">
                                    <label for="address">Address: </label>
                                    <input type="text" id="address" class="w-full" v-model="form.address">
                                </div>
                                <div class="mb-3">
                                    <label for="credit_limit">Credit Limit: </label>
                                    <input type="text" id="credit_limit" class="w-full" v-model="form.credit_limit">
                                </div>
                                  <button type="submit" class="bg-blue-400 text-white py-2 px-3 rounded">Submit</button>

                              </form>      
                            </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                      </div>
                    </div>
                  </div>

                  
                  <button class="btn rounded ms-2" @click="delEmp(creditor)">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                      <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5"/>
                    </svg>
                  </button>

                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
