 <div class="wrapper">
     <!-- Sidebar -->
     <nav id="sidebar" class="shadow-sm bg-dark">
         <div class="sidebar-header d-flex flex-column justify-content-center align-items-center p-3">
             <img src="{{ 'assets/livewire.png' }}" alt="LOGO" class="object-contain text-center"
                 style="width:100px;height:100px;">
             <h5 class="text-light fw-bold">Laravel x Livewire</h5>
         </div>



         <!-- Home Dropdown Menu -->
         <li class="d-flex justify-content-start align-items-center p-3 mb-1" style="height:50px;">
             <a wire:navigate href="{{ route('admin.dashboard') }}" id="dashboardBtn"><i
                     class="bi bi-house-fill me-2"></i>
                 <span>Dashboard</span></a>
         </li>
         <li class="d-flex justify-content-start align-items-center  p-3" style="height:50px;">
             <a wire:navigate href="{{ route('admin.transaction') }}" id="userBtn"><i class="bi bi-receipt me-2"></i>
                 <span>Transaction</span></a>
         </li>
         <li class="d-flex justify-content-start align-items-center  p-3" style="height:50px;">
             <a wire:navigate href="{{ route('admin.customers') }}" id="userBtn"><i
                     class="bi bi-person-fill me-2"></i>
                 <span>Customers</span></a>
         </li>
         <li class="d-flex justify-content-start align-items-center  p-3" style="height:50px;">
             <a wire:navigate href="{{ route('admin.product') }}" id="userBtn"><i class="bi bi-boxes me-2"></i>
                 <span>Add Product</span></a>
         </li>
         <li class="d-flex justify-content-start align-items-center  p-3" style="height:50px;">
             <a wire:navigate href="{{ route('view.adminLogout') }}" id="signoutBtn"><i
                     class="bi bi-arrow-left-square-fill me-2"></i>
                 <span>Sign Out</span></a>
         </li>
     </nav>

     <!-- Main content -->
     <div id="content">
         <!-- Navbar -->
         <nav class="navbar navbar-expand-lg navbar-light bg-light border-b-2 shadow-sm">
             <div class="container-fluid">
                 <!-- Sidebar Toggle Button -->
                 <a type="button" id="sidebarCollapse">
                     <i class="bi bi-list fs-1 text-dark fw-bold" id="toggleIcon"></i>
                 </a>

                 <div class="d-flex align-items-center">
                     @if (session('user_id'))
                         <h4 class="fw-bold mb-0 me-3">{{ session('firstname') }}</h4>
                     @endif

                     <img src="assets/default.jpg" alt="img"
                         class="object-fit rounded-circle border border-3 border-info shadow-md"
                         style="width:50px;height:50px;">
                 </div>
             </div>
         </nav>
         <!-- Content Section -->
         <div class="container-fluid h-auto p-4">
             @yield('page-content')
         </div>
     </div>

     <script>
         document.addEventListener('DOMContentLoaded', function() {
             // Attach click event listeners to AJAX links
             const ajaxLinks = document.querySelectorAll('.ajax-link');
             ajaxLinks.forEach(link => {
                 link.addEventListener('click', function(event) {
                     event.preventDefault(); // Prevent default link behavior

                     const url = this.getAttribute('href');
                     fetch(url)
                         .then(response => response.text())
                         .then(html => {
                             // Update the content area with the new page content
                             document.getElementById('content').innerHTML = html;
                         })
                         .catch(error => console.error('Error loading content:', error));
                 });
             });
         });
     </script>
 </div>
