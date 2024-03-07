<template>
   <main>
        <h1> Student Management</h1>
        <table class="table">
            <thead class="table-dark">
                <tr>
                <th scope="col">ID</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Middle Name</th>
                <th scope="col">Age</th>
                <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="student in studentList">
                <td>{{ student.id}}</td>
                <td>{{ student.first_name }}</td>
                <td>{{ student.last_name }}</td>
                <td>{{ student.middle_name }}</td>
                <td>{{ student.age }}</td>
                <td><button @click="showEditPopup(student)" type="button" class="btn btn-secondary"> Edit </button> <button @click="deleteStudent(student.id)" type="button" class="btn btn-danger"> Delete </button></td>
                </tr>
            </tbody>
        </table>

        <button type="button" class="btn btn-success" @click="showAddPopup()">Add Student</button>

        <EditPopup 
            :student_id="student_id" :lastName="lastName"  :firstName="firstName" :middleName="middleName" :age="age"
            v-if="editPopupTriggers" @close-popup="closePopup()" @reload-table="setStudentListTable()"
        />

        <AddPopup 
            v-if="addPopupTriggers" @close-popup="closePopup()" @reload-table="setStudentListTable()"
        />

    </main>
</template>

<style lang="css" scoped src="./StudentManagement.css"></style>

<script>
    import EditPopup from '../../../components/EditPopup/EditPopup.vue'
    import AddPopup from '../../../components/AddPopup/AddPopup.vue'

    export default {
        components: {
            EditPopup,
            AddPopup
        },

        mounted(){
            this.setStudentListTable();
        },

        data() {
            return {
                editPopupTriggers: false,
                addPopupTriggers: false,

                studentList: [],
       
                student_id : 0,
                lastName : null,
                firstName : null,
                middleName : null,
                age: 0
            }
        },

        methods: {
            async closePopup() {
                this.editPopupTriggers = false;
                this.addPopupTriggers = false;
            },
            async showEditPopup(currentStudent) {
                console.log(currentStudent)
                this.student_id = currentStudent.id
                this.firstName = currentStudent.first_name 
                this.middleName = currentStudent.middle_name
                this.lastName = currentStudent.last_name
                this.age = currentStudent.age

                this.editPopupTriggers = true;
            },

            async showAddPopup() {
                
                this.addPopupTriggers = true;
            },


            async deleteStudent(id) {
                try{
                    const response = await fetch(`http://localhost:8000/api/delete_student/${id}`, {
                        method: 'DELETE',
                    });

                    this.setStudentListTable();

                    alert("User Successfully Deleted")
                }catch(err) {
                    console.log(err)
                }
            },
            async setStudentListTable() {
                try{
                    const response = await fetch("http://localhost:8000/api/student_list");
                    const studentList = await response.json();
                    this.studentList = studentList;
                }catch(err) {
                    console.log(err)
                }
            }
        }
    }

</script>