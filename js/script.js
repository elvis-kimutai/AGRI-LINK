// script.js

let totalMaizePrice;
let bagsPrice;
let locationCharge = 100; // Assume a fixed charge for delivery

function MaizeOrder(bags, total, orderNo) {
  this.bags = bags;
  this.total = total;
  this.orderNo = orderNo;
}

MaizeOrder.prototype.calculateTotalPrice = function () {
  bagsPrice = this.bags * 50; // Assuming a price of $50 per bag
  totalMaizePrice = bagsPrice + locationCharge;
  $("#tb-total").html(totalMaizePrice);
};

$(document).ready(function () {
  let orderCount = 1;

  $("#order").click(function () {
    // Reset previous values
    totalMaizePrice = 0;
    bagsPrice = 0;

    let bagsCount = parseInt($("#bags-count").val()) || 0;
    let total = 0;
    let order = orderCount++;

    // Update table with order details
    $("#tb-bags").html(`${bagsCount} bags`);
    $("#tb-total").html(total);

    // Add order to the table
    $("#add-order").click(function () {
      bagsCount = parseInt($("#bags-count").val()) || 0;
      total = bagsCount * 50; // Assuming a price of $50 per bag

      let newMaizeOrder = new MaizeOrder(bagsCount, total, order);
      newMaizeOrder.calculateTotalPrice();

      let newRow = `<tr><th scope="row">${newMaizeOrder.orderNo}</th><td id="bags">${newMaizeOrder.bags} bags</td><td id="total">$${newMaizeOrder.total}</td></tr>`;
      $("#tb").append(newRow);
    });

    // Checkout button
    $("#checkOut").click(function () {
      $("#deliv-quiz").hide();
      $("button#yes").hide();
      $("button#no").hide();
      $("button#checkOut").hide();
      $("button#add-order").hide();
      $("button#order").hide();

      result.innerHTML = `The total amount is: $${totalMaizePrice}. Thank you and welcome again.`;
    });

    // Delivery options
    $("#yes").click(function () {
      $("#deliv-quiz").hide();
      $("button#yes").hide();
      $("button#no").hide();
      $("button#checkOut").hide();
      $("button#add-order").hide();
      $("button#order").hide();
      alert(`The delivery charge is: $${locationCharge}`);

      let userLocation = prompt("Please enter your location:");
      alert(`Your order will be delivered to: ${userLocation}`);

      result.innerHTML = `The total amount is: $${totalMaizePrice}. Thank you and welcome again.`;
    });

    $("#no").click(function () {
      $("#deliv-quiz").hide();
      $("button#yes").hide();
      $("button#no").hide();
      alert("Please proceed and click checkout.");
    });
  });
});