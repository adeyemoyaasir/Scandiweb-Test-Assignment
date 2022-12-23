$(document).ready(() => {
  $('select').change(() => {
    const VALUE = $('select option:selected');
    console.log(VALUE.text());
  });
});
