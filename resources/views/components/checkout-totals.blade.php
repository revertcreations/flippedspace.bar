@props(['totals'])

<div class="w-full">

  <div class="inline-flex w-full py-2">
      <h4 class="flex-grow">Sub Total</h4>
      <h4 class="justify-self-end">{{ '$220.00' }}</h4>
  </div>

  <hr>

  <div class="inline-flex w-full py-2">
      <h4 class="flex-grow">Shipping</h4>
      <h4 class="justify-self-end">{{ '$16.00' }}</h4>
  </div>

  <hr>

  <div class="inline-flex w-full py-2">
      <h3 class="flex-grow font-bold">Total </h3>
      <h3 class="justify-self-end font-bold text-2xl">{{ '$238.00' }}</h3>
  </div>

</div>
