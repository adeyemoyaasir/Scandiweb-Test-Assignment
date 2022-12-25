// Display the correct form input according to the product type

$(document).ready(() => {
  const SELECT = $('#productType');
  const SIZE_CONTAINER = $('#size-container');
  const WEIGHT_CONTAINER = $('#weight-container');
  const DIMENSIONS_CONTAINER = $('#dimensions-container');

  SELECT.change(() => {
    if (SELECT.val() === 'book') {
      WEIGHT_CONTAINER.show();
      SIZE_CONTAINER.hide();
      DIMENSIONS_CONTAINER.hide();
    }

    if (SELECT.val() === 'furniture') {
      WEIGHT_CONTAINER.hide();
      SIZE_CONTAINER.hide();
      DIMENSIONS_CONTAINER.show();
    }

    if (SELECT.val() === 'dvd') {
      WEIGHT_CONTAINER.hide();
      SIZE_CONTAINER.show();
      DIMENSIONS_CONTAINER.hide();
    }
  });
});
