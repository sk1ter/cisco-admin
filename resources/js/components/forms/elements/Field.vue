<template>
    <div class="bc mb-3">
        <div class="close">
            <button @click="onClose(index)" class="btn btn-link"><i class="fas fa-times"></i></button>
        </div>
        <div class="mb-3">
            <label class="form-label">Наименование позиции</label>
            <input v-model="key" type="text" class="form-control" name="key[]">
        </div>
        <div class="mb-3">
            <label class="form-label">Свойство позиции</label>
            <input type="text" v-model="value" class="form-control" name="value[]">
        </div>
    </div>
</template>

<script>
export default {
    name: "Field",
    props: {
        index: {
            required: true
        },
        type: {
            required: true
        },
        initKey: {
            type: String
        },
        initVal: {
            type: String
        },
        onChange: {
            type: Function,
            required: true
        },
        onClose: {
            type: Function,
            required: true
        }
    },
    data() {
        return {
            key: this.initKey ?? null,
            value: this.initVal ?? null
        };
    },
    watch: {
        "key": function (newVal, oldVal) {
            this.onChange({key: newVal, value: this.value, type: this.type, hash: this.index})
        },
        "value": function (newVal, oldVal) {
            this.onChange({key: this.key, value: newVal, type: this.type,  hash: this.index})
        },
    }
}
</script>

<style scoped>
.bc {
    position: relative;
    border: 1px solid #c1c0c0;
    border-radius: 5px;
    padding: 10px;
}
.close {
    position: absolute;
    right: 5px;
    top: 2px;
}

label {
    font-weight: bold;
}
</style>
