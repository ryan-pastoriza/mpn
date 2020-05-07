<template>
	<!-- Basic Examples -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        BASIC EXAMPLE
                    </h2>
                    <ul class="header-dropdown m-r--5">
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">more_vert</i>
                            </a>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="javascript:void(0);">Action</a></li>
                                <li><a href="javascript:void(0);">Another action</a></li>
                                <li><a href="javascript:void(0);">Something else here</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                                <tr>
				                	<th scope="col">Id</th>
									<th scope="col">First Name</th>
									<th scope="col">Middle Name</th>
									<th scope="col">Last Name</th>
									<th scope="col">Suffix</th>
				                </tr>
                            </thead>
                            <tfoot>
                                <tr>
				                	<th scope="col">Id</th>
									<th scope="col">First Name</th>
									<th scope="col">Middle Name</th>
									<th scope="col">Last Name</th>
									<th scope="col">Suffix</th>
				                </tr>
                            </tfoot>
                            <tbody>
                            	<tr v-for="stud_per in model.$data">
				                	<td>{{stud_per.spi_id}}</td>
				                  	<td>{{stud_per.fname}}</td>
				                  	<td>{{stud_per.mname}}</td>
				                  	<td>{{stud_per.lname}}</td>
				                  	<td>{{stud_per.suffix}}</td>
				                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #END# Basic Examples -->

</template>

<script>
	import axios from 'axios'

	export default{
		data(){
			return{
				model:{},
				search:'',
				url:'api/student'
			}
		},
		created:function(){
			this.fetchStudentData()
		},
		methods:{
			fetchStudentData(){
				var vm = this
				axios.get(`${this.url}?search=${this.search}`)
					.then(function (response){
						Vue.set(vm.$data,'model',response.data.model)
					})
					.catch(e => {
	                  this.errors.push(e)
	                })
			}
		}
	}

</script>