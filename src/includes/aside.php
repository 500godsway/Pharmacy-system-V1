<?php

  require '../authenticate.php';
?>
<aside
      id="sidebar-multi-level-sidebar"
      class="fixed top-0 left-0 z-40 text-sm w-64 h-screen transition-transform -translate-x-full sm:translate-x-0 shadow-xl"
      aria-label="Sidebar"
    >
      <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800">
        <ul class="space-y-2 font-sm">
          <li>
            <a
              href="../main/index.php"
              class="flex items-center p-2 text-gray-600 rounded-lg dark:text-white  hover:text-green-500 group"
            >
              <svg
                class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-green-500 dark:group-hover:text-green-500"
                aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg"
                fill="currentColor"
                viewBox="0 0 22 21"
              >
                <path
                  d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z"
                />
                <path
                  d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z"
                />
              </svg>
              <span class="ms-3">Dashboard</span>
            </a>
          </li>
          <li>
            <button
              type="button"
              class="flex  items-center w-full p-2 focus:outline-none text-sm text-gray-600 transition duration-75 rounded-lg group   dark:text-white hover:text-green-500 dark:hover:bg-gray-700"
              aria-controls="customers"
              data-collapse-toggle="customers"
            >
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
            </svg>
              <span
                class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap"
                >Customers</span
              >
              <svg
                class="w-2 h-2"
                aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 10 6"
              >
                <path
                  stroke="currentColor"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="m1 1 4 4 4-4"
                />
              </svg>
            </button>
            <ul id="customers" class="hidden py-2 space-y-2">
              <li>
                <a
                  href="../customers/customers.php"
                  class="flex items-center w-full p-2 text-gray-600 transition duration-75 rounded-lg pl-11 group  dark:text-white dark:hover:bg-gray-700 hover:text-green-500"
                  >Customers</a
                >
              </li>
            </ul>
          </li>
          <li>
            <button
              type="button"
              class="flex items-center w-full p-2 text-sm focus:outline-none text-gray-600 transition duration-75 rounded-lg group  dark:text-white dark:hover:bg-gray-700 hover:text-green-500"
              aria-controls="suppliers"
              data-collapse-toggle="suppliers"
            >
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
              </svg>
              <span
                class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap"
                >Suppliers</span
              >
              <svg
                class="w-2 h-2"
                aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 10 6"
              >
                <path
                  stroke="currentColor"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="m1 1 4 4 4-4"
                />
              </svg>
            </button>
            <ul id="suppliers" class="hidden py-2 space-y-2">
              <li>
                <a
                  href="../suppliers/suppliers.php"
                  class="flex items-center w-full p-2 text-gray-600 transition duration-75 rounded-lg pl-11 group  dark:text-white dark:hover:bg-gray-700 hover:text-green-500"
                  > Suppliers</a
                >
              </li>
              <li>
                <a
                  href="../suppliers/addSuppliers.php"
                  class="flex items-center w-full p-2 text-gray-600 transition duration-75 rounded-lg pl-11 group  dark:text-white dark:hover:bg-gray-700 hover:text-green-500"
                  >Add Suppliers</a
                >
              </li>
              
            </ul>
          </li>
          <li>
            <button
              type="button"
              class="flex items-center w-full p-2 text-sm focus:outline-none text-gray-600 transition duration-75 rounded-lg group  dark:text-white dark:hover:bg-gray-700 hover:text-green-500"
              aria-controls="products"
              data-collapse-toggle="products"
            >
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
            </svg>
              <span
                class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap"
                >Products</span
              >
              <svg
                class="w-2 h-2"
                aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 10 6"
              >
                <path
                  stroke="currentColor"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="m1 1 4 4 4-4"
                />
              </svg>
            </button>
            <ul id="products" class="hidden py-2 space-y-2">
              <li>
                <a
                  href="../products/products.php"
                  class="flex items-center w-full p-2 text-gray-600 transition duration-75 rounded-lg pl-11 group  dark:text-white dark:hover:bg-gray-700 hover:text-green-500"
                  >Products</a
                >
              </li>
              <li>
                <a
                  href="../categories/categories.php"
                  class="flex items-center w-full p-2 text-gray-600 transition duration-75 rounded-lg pl-11 group  dark:text-white dark:hover:bg-gray-700 hover:text-green-500"
                  >Category</a
                >
              </li>
              <li>
                <a
                  href="../products/requisation-summery.php"
                  class="flex items-center w-full p-2 text-gray-600 transition duration-75 rounded-lg pl-11 group  dark:text-white dark:hover:bg-gray-700 hover:text-green-500"
                  >Requisations</a
                >
              </li>
             
            </ul>
          </li>
          <li>
            <button
              type="button"
              class="flex items-center w-full p-2 text-sm focus:outline-none text-gray-600 transition duration-75 rounded-lg group  dark:text-white dark:hover:bg-gray-700 hover:text-green-500"
              aria-controls="purchases"
              data-collapse-toggle="purchases"
            >
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
              </svg>
              <span
                class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap"
                >Purchases / Stock </span
              >
              <svg
                class="w-2 h-2"
                aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 10 6"
              >
                <path
                  stroke="currentColor"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="m1 1 4 4 4-4"
                />
              </svg>
            </button>
            <ul id="purchases" class="hidden py-2 space-y-2">
              <li>
                <a
                  href="../purchases/purchases.php"
                  class="flex items-center w-full p-2 text-gray-600 transition duration-75 rounded-lg pl-11 group  dark:text-white dark:hover:bg-gray-700 hover:text-green-500"
                  >Purchases List</a
                >
              </li>
            </ul>
          </li>
          <li>
            <button
              type="button"
              class="flex items-center w-full p-2 text-sm focus:outline-none text-gray-600 transition duration-75 rounded-lg group  dark:text-white dark:hover:bg-gray-700 hover:text-green-500"
              aria-controls="sales"
              data-collapse-toggle="sales"
            >
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
              </svg>
              <span
                class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap"
                >Sales</span
              >
              <svg
                class="w-2 h-2"
                aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 10 6"
              >
                <path
                  stroke="currentColor"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="m1 1 4 4 4-4"
                />
              </svg>
            </button>
            <ul id="sales" class="hidden py-2 space-y-2">
              <li>
                <a
                  href="../sales/posInvoice.php"
                  class="flex items-center w-full p-2 text-gray-600 transition duration-75 rounded-lg pl-11 group  dark:text-white dark:hover:bg-gray-700 hover:text-green-500"
                  > POS </a
                >
              </li>
              <li>
                <a
                  href="../sales/sales.php"
                  class="flex items-center w-full p-2 text-gray-600 transition duration-75 rounded-lg pl-11 group  dark:text-white dark:hover:bg-gray-700 hover:text-green-500"
                  > Sales </a
                >
              </li>
              <li>
                <a
                  href="../sales/salesOrdersList.php"
                  class="flex items-center w-full p-2 text-gray-600 transition duration-75 rounded-lg pl-11 group  dark:text-white dark:hover:bg-gray-700 hover:text-green-500"
                  >Sales Order</a
                >
              </li>
              <li>
                <a
                  href="../sales/salesOrder.php"
                  class="flex items-center w-full p-2 text-gray-600 transition duration-75 rounded-lg pl-11 group  dark:text-white dark:hover:bg-gray-700 hover:text-green-500"
                  > Add Sales Order</a
                >
              </li>
            </ul>
          </li>

          <li>
            <button
              type="button"
              class="flex items-center w-full p-2 text-sm focus:outline-none text-gray-600 transition duration-75 rounded-lg group  dark:text-white dark:hover:bg-gray-700 hover:text-green-500"
              aria-controls="stock"
              data-collapse-toggle="stock"
            >
             <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 6.878V6a2.25 2.25 0 0 1 2.25-2.25h7.5A2.25 2.25 0 0 1 18 6v.878m-12 0c.235-.083.487-.128.75-.128h10.5c.263 0 .515.045.75.128m-12 0A2.25 2.25 0 0 0 4.5 9v.878m13.5-3A2.25 2.25 0 0 1 19.5 9v.878m0 0a2.246 2.246 0 0 0-.75-.128H5.25c-.263 0-.515.045-.75.128m15 0A2.25 2.25 0 0 1 21 12v6a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 18v-6c0-.98.626-1.813 1.5-2.122" />
              </svg>
              <span
                class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap"
                >Stock Adjustments</span
              >
              <svg
                class="w-2 h-2"
                aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 10 6"
              >
                <path
                  stroke="currentColor"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="m1 1 4 4 4-4"
                />
              </svg>
            </button>
            <ul id="stock" class="hidden py-2 space-y-2">
              <li>
                <a
                  href="../stock/stock.php"
                  class="flex items-center w-full p-2 text-gray-600 transition duration-75 rounded-lg pl-11 group  dark:text-white dark:hover:bg-gray-700 hover:text-green-500"
                  >Make Adjustments</a
                >
              </li>
              
            </ul>
          </li>
          <li>
            <button
              type="button"
              class="flex items-center w-full p-2 text-sm focus:outline-none text-gray-600 transition duration-75 rounded-lg group  dark:text-white dark:hover:bg-gray-700 hover:text-green-500"
              aria-controls="services"
              data-collapse-toggle="services"
            >
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 17.25v3.375c0 .621-.504 1.125-1.125 1.125h-9.75a1.125 1.125 0 0 1-1.125-1.125V7.875c0-.621.504-1.125 1.125-1.125H6.75a9.06 9.06 0 0 1 1.5.124m7.5 10.376h3.375c.621 0 1.125-.504 1.125-1.125V11.25c0-4.46-3.243-8.161-7.5-8.876a9.06 9.06 0 0 0-1.5-.124H9.375c-.621 0-1.125.504-1.125 1.125v3.5m7.5 10.375H9.375a1.125 1.125 0 0 1-1.125-1.125v-9.25m12 6.625v-1.875a3.375 3.375 0 0 0-3.375-3.375h-1.5a1.125 1.125 0 0 1-1.125-1.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H9.75" />
            </svg>
              <span
                class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap"
                >Expenses</span
              >
              <svg
                class="w-2 h-2"
                aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 10 6"
              >
                <path
                  stroke="currentColor"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="m1 1 4 4 4-4"
                />
              </svg>
            </button>
            <ul id="services" class="hidden py-2 space-y-2">
              <li>
                <a
                  href="../expenses/expenses.php"
                  class="flex items-center w-full p-2 text-gray-600 transition duration-75 rounded-lg pl-11 group  dark:text-white dark:hover:bg-gray-700 hover:text-green-500"
                  >Expenses</a
                >
              </li>
              
            </ul>
          </li>
          <li>
            <button
              type="button"
              class="flex items-center w-full p-2 text-sm focus:outline-none text-gray-600 transition duration-75 rounded-lg group  dark:text-white dark:hover:bg-gray-700 hover:text-green-500"
              aria-controls="categories"
              data-collapse-toggle="categories"
            >
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
              </svg>
              <span
                class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap"
                >Dose Form</span
              >
              <svg
                class="w-2 h-2"
                aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 10 6"
              >
                <path
                  stroke="currentColor"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="m1 1 4 4 4-4"
                />
              </svg>
            </button>
            <ul id="categories" class="hidden py-2 space-y-2">
              <li>
                <a
                  href="../categories/categories.php"
                  class="flex items-center w-full p-2 text-gray-600 transition duration-75 rounded-lg pl-11 group  dark:text-white dark:hover:bg-gray-700 hover:text-green-500"
                  > Dose Form List</a
                >
              </li>
            </ul>
          </li>
          <li>
            <button
              type="button"
              class="flex items-center w-full p-2 text-sm focus:outline-none text-gray-600 transition duration-75 rounded-lg group  dark:text-white dark:hover:bg-gray-700 hover:text-green-500"
              aria-controls="medicinesize"
              data-collapse-toggle="medicinesize"
            >
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
              </svg>
              <span
                class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap"
                >Medicine Size</span
              >
              <svg
                class="w-2 h-2"
                aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 10 6"
              >
                <path
                  stroke="currentColor"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="m1 1 4 4 4-4"
                />
              </svg>
            </button>
            <ul id="medicinesize" class="hidden py-2 space-y-2">
              <li>
                <a
                  href="../medicineSize/medicineSize.php"
                  class="flex items-center w-full p-2 text-gray-600 transition duration-75 rounded-lg pl-11 group  dark:text-white dark:hover:bg-gray-700 hover:text-green-500"
                  > Medicine Size List</a
                >
              </li>
            </ul>
          </li>
          <li>
            <button
              type="button"
              class="flex items-center w-full p-2 text-sm focus:outline-none text-gray-600 transition duration-75 rounded-lg group  dark:text-white dark:hover:bg-gray-700 hover:text-green-500"
              aria-controls="admin"
              data-collapse-toggle="admin"
            >
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
            </svg>
              <span
                class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap"
                >Users Accounts</span
              >
              <svg
                class="w-2 h-2"
                aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 10 6"
              >
                <path
                  stroke="currentColor"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="m1 1 4 4 4-4"
                />
              </svg>
            </button>
            <ul id="admin" class="hidden py-2 space-y-2">
              <li>
                <a
                  href="../admins/users.php"
                  class="flex items-center w-full p-2 text-gray-600 transition duration-75 rounded-lg pl-11 group  dark:text-white dark:hover:bg-gray-700 hover:text-green-500"
                  > Users</a
                >
              </li>
              <li>
                <a
                  href="../admins/addUsers.php"
                  class="flex items-center w-full p-2 text-gray-600 transition duration-75 rounded-lg pl-11 group  dark:text-white dark:hover:bg-gray-700 hover:text-green-500"
                  >Add Users</a
                >
              </li>
              
            </ul>
          </li>
          <li>
            <button
              type="button"
              class="flex items-center w-full p-2 text-sm focus:outline-none text-gray-600 transition duration-75 rounded-lg group  dark:text-white dark:hover:bg-gray-700 hover:text-green-500"
              aria-controls="returns"
              data-collapse-toggle="returns"
            >
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
              <path d="M21 6.375c0 2.692-4.03 4.875-9 4.875S3 9.067 3 6.375 7.03 1.5 12 1.5s9 2.183 9 4.875Z" />
              <path d="M12 12.75c2.685 0 5.19-.586 7.078-1.609a8.283 8.283 0 0 0 1.897-1.384c.016.121.025.244.025.368C21 12.817 16.97 15 12 15s-9-2.183-9-4.875c0-.124.009-.247.025-.368a8.285 8.285 0 0 0 1.897 1.384C6.809 12.164 9.315 12.75 12 12.75Z" />
              <path d="M12 16.5c2.685 0 5.19-.586 7.078-1.609a8.282 8.282 0 0 0 1.897-1.384c.016.121.025.244.025.368 0 2.692-4.03 4.875-9 4.875s-9-2.183-9-4.875c0-.124.009-.247.025-.368a8.284 8.284 0 0 0 1.897 1.384C6.809 15.914 9.315 16.5 12 16.5Z" />
              <path d="M12 20.25c2.685 0 5.19-.586 7.078-1.609a8.282 8.282 0 0 0 1.897-1.384c.016.121.025.244.025.368 0 2.692-4.03 4.875-9 4.875s-9-2.183-9-4.875c0-.124.009-.247.025-.368a8.284 8.284 0 0 0 1.897 1.384C6.809 19.664 9.315 20.25 12 20.25Z" />
            </svg>
              <span
                class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap"
                >Database </span
              >
              <svg
                class="w-2 h-2"
                aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 10 6"
              >
                <path
                  stroke="currentColor"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="m1 1 4 4 4-4"
                />
              </svg>
            </button>
            <ul id="returns" class="hidden py-2 space-y-2">
              
              <li>
                <a
                  href="../database/database.php"
                  class="flex items-center w-full p-2 text-gray-600 transition duration-75 rounded-lg pl-11 group  dark:text-white dark:hover:bg-gray-700 hover:text-green-500"
                  >Export Database</a
                >
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </aside>