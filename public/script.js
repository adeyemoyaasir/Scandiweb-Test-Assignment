$(document).ready(() => {
  $('select').change(() => {
    const VALUE = $('select option:selected');
    const SIZE_CONTAINER = $('#size-container');
    const WEIGHT_CONTAINER = $('#weight-container');
    const DIMENSIONS_CONTAINER = $('#dimensions-container');

    if (VALUE.text() === 'Book') {
      WEIGHT_CONTAINER.show();
      SIZE_CONTAINER.hide();
      DIMENSIONS_CONTAINER.hide();
    } else if (VALUE.text() === 'Furniture') {
      WEIGHT_CONTAINER.hide();
      SIZE_CONTAINER.hide();
      DIMENSIONS_CONTAINER.show();
    } else {
      WEIGHT_CONTAINER.hide();
      SIZE_CONTAINER.show();
      DIMENSIONS_CONTAINER.hide();
    }
  });
});
