<template>
    <div class="popup">
        <div class="popup-inner">
    
                <div class="form-group">
                    <label>First Name</label>
                    <input type="text" class="form-control" id="exampleInputtext1" v-model="student_firstName" required>
                </div>
                <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" class="form-control" id="exampleInputtext1" v-model="student_lastName" required>
                </div>
                <div class="form-group">
                    <label>Middle Name</label>
                    <input type="text" class="form-control" id="exampleInputtext1" v-model="student_middleName" required>
                </div>
                <div class="form-group">
                    <label>Age</label>
                    <input type="number" class="form-control" id="exampleInputtext1" v-model="student_age" min="12" required>
                </div>
                <button class="btn btn-primary" @click="AddStudent()">Submit</button>
                <button class="btn btn-primary" @click="$emit('close-popup')">Cancel</button>
        </div>
    </div>
</template>

<style lang="css" scoped src="./AddPopup.css"></style>

<script>
    import VueDatePicker from '@vuepic/vue-datepicker';
    import '@vuepic/vue-datepicker/dist/main.css'

    export default {
        components : {
            VueDatePicker,
        },

        data() {
            return {
               student_firstName: this.firstName,
               student_lastName: this.lastName,
               student_middleName: this.middleName,
               student_age: this.age
            };
        },

        methods: {
            async AddStudent() {
                if(this.student_firstName || this.student_lastName || this.student_middleName || this.student_age) {
                    let params = {
                        first_name : this.student_firstName,
                        last_name : this.student_lastName,
                        middle_name : this.student_middleName,
                        age : this.student_age
                    }

                    try {
                        let response = await fetch("http://localhost:8000/api/add_student", {
                            method: "POST",
                            body: JSON.stringify(params),
                            headers: {
                                "Content-type": "application/json; charset=UTF-8"
                            }
                        })
                        this.$emit('close-popup')
                        this.$emit('reload-table')
                        alert("Schedule Successfully Added")
                    } catch(err) {
                        alert(err);
                    }
                } else {
                    alert("Invalid Inputs");
                }
            },
        }
    }
 
</script>

<style lang="scss" scope>
.popup {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    z-index: 99;
    background-color: rgba(0, 0, 0, 0.2);

    display: flex;
    align-items: center;
    justify-content: center;

    .popup-inner {
        background: #FFF;
        padding: 32px;
    }
}

</style>

