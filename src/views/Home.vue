<template>
    <div class="login">
        <el-container>
            <router-link :to="{path:'/info/setting'}">个人设置</router-link>
        </el-container>
    </div>
</template>

<script>
    export default {
        data()  {
            var validateUsername = (rule, value, callback) => {
                if (value === '') {
                    callback(new Error('请输入账号'));
                } else {
                    if (this.ruleForm.checkPass !== '') {
                        this.$refs.ruleForm.validateField('checkPass');
                    }
                    callback();
                }
            };
            var validatePass = (rule, value, callback) => {
                if (value === '') {
                    callback(new Error('请输入密码'));
                } else {
                    if (this.ruleForm.checkPass !== '') {
                        this.$refs.ruleForm.validateField('checkPass');
                    }
                    callback();
                }
            };
            var validatePass2 = (rule, value, callback) => {
                if (value === '') {
                    callback(new Error('请再次输入密码'));
                } else if (value !== this.ruleForm.pass) {
                    callback(new Error('两次输入密码不一致!'));
                } else {
                    callback();
                }
            };
            return {
                ruleForm: {
                    username: '',
                    pass: '',
                    checkPass: '',
                },
                rules: {
                    username: [
                        { validator: validateUsername, trigger: 'blur' }
                    ],
                    pass: [
                        { validator: validatePass, trigger: 'blur' }
                    ],
                    checkPass: [
                        { validator: validatePass2, trigger: 'blur' }
                    ],

                }
            };
        },
        methods: {
            submitForm(formName) {
                this.$refs[formName].validate((valid) => {
                    if (valid) {
                        console.log('helllo');
                    } else {
                        console.log('error submit!!');
                        return false;
                    }
                });
            },
            resetForm(formName) {
                this.$refs[formName].resetFields();
            }
        },
        created: function () {
            let token = localStorage.getItem('zheng');
            // 如果没有登录就跳转到登录页
            if(token) {
                this.$router.push('/Login');
            }
        },
    }
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

    .el-header {
        color: #333;
        text-align: center;
        line-height: 60px;
    }

    .title-line .tit {
        height: 56px;
        line-height: 56px;
        margin: 0 auto;
        padding: 0 20px;
        font-size: 40px;
        background: #fff;
        text-align: center;
    }

    .el-main {
        color: #333;
        text-align: center;
        line-height: 160px;
        width: 30%;
        margin: 0 auto;
    }
</style>
