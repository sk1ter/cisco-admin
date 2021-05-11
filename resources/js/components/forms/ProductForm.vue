<template>
    <div class="row">
        <div class="col-md-4">
            <div class="mb-3">
                <label for="description">Описание</label>
                <textarea name="description" v-model="form.description" id="description"
                          :class="`form-control ${errors.description !== null ? 'is-invalid' : ''}`" cols="30"
                          rows="5"></textarea>
                <div class="invalid-feedback">
                    {{ errors.description }}
                </div>
            </div>
            <Field v-for="(field, idx) in descFields" :type="field.type"  :initVal="field.value" :initKey="field.key" :key="field.hash" :index="field.hash"
                   :on-change="onFieldChange" :on-close="onFieldClosed"/>
            <button class="btn btn-link add-btn cbtn" @click="addField('description')"><i class="fas fa-plus"></i>
                Добавить пункт
            </button>
        </div>
        <div class="col-md-4">
            <div class="mb-3">
                <label for="characteristics">Характеристики</label>
                <textarea v-model="form.characteristics" name="characteristics" id="characteristics"
                          :class="`form-control ${errors.characteristics !== null ? 'is-invalid' : ''}`" cols="30"
                          rows="5"></textarea>
                <div class="invalid-feedback">
                    {{ errors.characteristics }}
                </div>
            </div>
            <Field v-for="(field, idx) in characteristicsFields" :type="field.type" :initVal="field.value" :initKey="field.key" :key="field.hash"
                   :index="field.hash" :on-change="onFieldChange" :on-close="onFieldClosed"/>
            <button class="btn btn-link add-btn cbtn" @click="addField('characteristics')"><i class="fas fa-plus"></i>
                Добавить пункт
            </button>
        </div>
        <div class="col-md-4">
            <div class="mb-3">
                <label for="features">Особенности</label>
                <textarea v-model="form.features" name="features" id="features"
                          :class="`form-control ${errors.features !== null ? 'is-invalid' : ''}`" cols="30"
                          rows="5"></textarea>
                <div class="invalid-feedback">
                    {{ errors.features }}
                </div>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" v-model="form.name"
                       :class="`form-control ${errors.name !== null ? 'is-invalid' : ''}`" id="name" name="name">
                <div class="invalid-feedback">
                    {{ errors.name }}
                </div>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Изображение</label>
                <input type="url" v-model="form.image_url"
                       :class="`form-control ${errors.image_url !== null ? 'is-invalid' : ''}`" id="image"
                       name="image_url">
                <div class="invalid-feedback">
                    {{ errors.image_url }}
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-end">
        <button @click="submit" class="btn btn-cprimary">Сохранить</button>
    </div>
</template>

<script>
import Field from "./elements/Field";
import {v4 as uuidv4} from 'uuid';

export default {
    name: "ProductForm",
    components: {Field},
    data() {
        return {
            fields: [

            ],
            form: {
                id: null,
                name: null,
                description: null,
                characteristics: null,
                features: null,
                image_url: null
            },
            errors: {
                description: null,
                characteristics: null,
                features: null,
                image_url: null,
                name: null
            }

        }
    },
    async mounted() {
        const params = new URLSearchParams(window.location.search);
        this.form.id = params.get('id');
        if (this.form.id !== null) {
            const data = await (await fetch('/ap/products/' + this.form.id)).json();
            if (data) {
                this.form = {
                    id: this.form.id,
                    characteristics: data.characteristics,
                    description: data.description,
                    image_url: data.image_url,
                    name: data.name,
                    features: data.particular_qualities
                }

                data.fields.forEach(el => {
                    this.fields.push({
                        type: el.identifier,
                        key: el.key,
                        hash: uuidv4(),
                        value: el.value
                    })
                });
            }
        }
    },
    methods: {
        addField(type) {
            this.fields.push({type: type, hash: uuidv4(), key: null, value: null});
        },
        onFieldClosed(index) {
            this.fields = this.fields.filter(el => {
                return el.hash !== index;
            });
        },
        onFieldChange(data) {
            this.fields = this.fields.map(el => {
                if (el.type === data.type && el.hash === data.hash) {
                    el.key = data.key;
                    el.value = data.value;
                    return el;
                }
                return el;
            });
        },
        submit() {
            if (!this.validate()) {
                return;
            }
            const data = {
                id: this.form.id,
                characteristics: this.form.characteristics,
                description: this.form.description,
                image_url: this.form.image_url,
                name: this.form.name,
                particular_qualities: this.form.features,
                fields: this.fields.filter(el => {
                   return el.key !== null && el.value !== null && el.type !== null;
                }).map(el => {
                    return {
                        key: el.key,
                        value: el.value,
                        identifier: el.type
                    };
                })
            };
            fetch('/ap/products', {
                method: 'POST', body: JSON.stringify(data), headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                }
            })
                .then(res => res.json())
                .then(data => {
                    if(data.success) {
                        location.reload();
                    } else {
                        alert(data.message);
                    }
                }).catch(err => {
                alert(err);
            });
        },
        validate() {
            let valid = true;
            for (let key in this.form) {
                if (key === 'id') {
                    continue;
                }
                if (this.form[key] === null || this.form[key].length === 0) {
                    this.errors[key] = "Пожалуйста, заполните поле";
                    valid = false;
                } else {
                    this.errors[key] = null;
                }
            }

            return valid;
        }
    },
    computed: {
        descFields: function () {
            return this.fields.filter(el => {
                return el.type === 'description';
            });
        },
        characteristicsFields: function () {
            return this.fields.filter(el => {
                return el.type === 'characteristics';
            });
        }
    }
}
</script>

<style scoped>
label {
    font-weight: bold;
}

.cbtn {
    font-size: 14px !important;
}

.cbtn:hover {
    background: rgba(0, 0, 0, 0.13);
}

.cbtn i {
    font-size: 14px !important;
    padding: 10px;
}
</style>
