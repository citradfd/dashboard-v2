<template>
  <select ref="select">
    <option disabled value="0">Pilih</option>
  </select>
</template>

<script>
export default {
  props: ['options', 'value'],
  mounted() {
    this.initializeSelect2();
  },
  watch: {
    value(newValue) {
      $(this.$refs.select)
        .val(newValue)
        .trigger('change');
    },
    options(newOptions) {
      this.updateOptions(newOptions);
    },
  },
  methods: {
    initializeSelect2() {
      const vm = this;
      $(this.$refs.select)
        .select2({ data: this.options })
        .val(this.value)
        .trigger('change')
        .on('change', function () {
          const selectedValue = $(this).val();
          vm.$emit('input', selectedValue); // Emit input event for v-model
          vm.$emit('change', selectedValue); // Emit change event for custom handling
        });
    },
    updateOptions(options) {
      const $select = $(this.$refs.select);
      // Clear previous options
      $select.empty();
      // Add the default option
      $select.append('<option disabled value="0">Pilih</option>');
      // Reinitialize select2 with new options
      $select.select2({ data: options });
      // Trigger a change to update the displayed value
      $select.val(this.value).trigger('change');
    },
  },
  destroyed() {
    $(this.$refs.select).off().select2('destroy');
  },
};
</script>

<style scoped>

</style>
