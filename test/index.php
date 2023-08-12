<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title> Test side-nav </title>

   <!-- Custome Css -->
   <link rel="stylesheet" href="./css/main.css">
   <link rel="stylesheet" href="./css/users.css">
   <link rel="stylesheet" href="./css/admin.css">
   <link rel="stylesheet" href="./css/application.css">
   <link rel="stylesheet" href="./css/applicants.css">
   <link rel="stylesheet" href="./css/sched.css">
   <link rel="stylesheet" href="./css/interview.css">
   <link rel="stylesheet" href="./css/appl-archive.css">
   <link rel="stylesheet" href="./css/services.css">
   <link rel="stylesheet" href="./css/service_request.css">
   <link rel="stylesheet" href="./css/archive.css">

   <!-- Font Awesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
   <main>
      <!-- LEFT PANEL -->
      <div class="side-navigation">

         <div class="logo">
            <img src="../assets/icons/client  logo.png">
         </div>

         <nav class="nav-bar main-nav">
            <ul>

               <!-- dashboard icon -->
               <li>       
                  <div class="nav-link dashboard ">
                     <div class="icon isSelected"> 
                        <i class="fas fa-chart-bar"></i>
                     </div>

                     <p class="link-name"> Dashboard </p> <!-- show this when hover -->
                  </div>
               </li>
               
               <!-- users icon -->
               <li>     
                  <div class="nav-link">
                     <div class="icon"> 
                        <i class="fas fa-users"> </i>
                     </div>

                     <p class="link-name"> Users </p> <!-- show this when hover -->
                  </div>
               </li>

               <!-- admins icon -->
               <li>                  
                  <div class="nav-link">
                     <div class="icon"> 
                        <i class="fas fa-users-cog"> </i>
                     </div>

                     <p class="link-name"> Admins </p> 
                  </div>
               </li>

               <!-- applications icon -->
               <li>             
                  <div class="nav-link">
                     <div class="icon"> 
                        <i class="fas fa-list-alt"> </i>
                     </div>

                     <p class="link-name"> Application </p> <!-- show this when hover -->
                  </div>
               </li>

               <!-- schedule icon 
               <li> 
                  
                  <div class="nav-link">
                     <div class="icon"> 
                        <i class="fas fa-calendar-check"> </i>
                     </div>

                     <p class="link-name"> Schedule Interview </p>
                  </div>
               </li> -->

               <!-- services icon -->
               <li>  
                  <div class="nav-link">
                     <div class="icon"> 
                        <i class="fas fa-cogs"> </i>
                     </div>

                     <p class="link-name"> Services </p>
                  </div>
               </li>

               <!-- pets icon -->
               <li> 
                  <div class="nav-link">
                     <div class="icon"> 
                        <i class="fas fa-paw"> </i>
                     </div>

                     <p class="link-name"> Pets </p>
                  </div>
               </li>
               
                <!-- donation icon 
               <li> 
                 
                  <div class="nav-link">
                     <div class="icon"> 
                        <i class="fas fa-coins"> </i>
                     </div>

                     <p class="link-name"> Donation </p>  
                  </div>
               </li> -->
               
               <!-- report icon 
               <li> 
                
                  <div class="nav-link">
                     <div class="icon"> 
                        <i class="fas fa-list-check"> </i>
                     </div>

                     <p class="link-name"> Reports </p> 
                  </div>
               </li> -->

               <!-- archive icon -->
               <li> 
                
                  <div class="nav-link">
                     <div class="icon"> 
                        <i class="fas fa-archive"> </i>
                     </div>

                     <p class="link-name"> Archive </p> <!-- show this when hover -->
                  </div>
               </li>
            </ul>
         </nav>

         <nav class="nav-bar side-nav">
            <ul>
               <li> 
                  <!-- userr icon -->
                  <div class="nav-link">
                     <div class="icon"> 
                        <i class="fas fa-edit"> </i>
                     </div>

                     <p class="link-name"> Edit Content </p> <!-- show this when hover -->
                  </div>
               </li>

               <li> 
                  <!-- userr icon -->
                  <div class="nav-link">
                     <a href="index.php">
                        <div class="icon"> 
                           <i class="fas fa-power-off"> </i> 
                        </div>
                     </a>

                     <p class="link-name"> Logout </p> <!-- show this when hover -->
                  </div>
               </li>
         </nav>
      </div>

      
      <!-- MAIN PANEL -->
      <div class="main-content">
         <!-- MAIN HEADER  -->
         <header class="main-header">
            <div class="text-header">
               <p> Quezon City Animal Care and Adoption Center
               </p>
               <span> 
                  iSagip - Pet Adoption System | RectiBytes
               </span>
               
            </div>

            <!-- <div class="search-container">
               
               <div class="search">
                  <i class="fa fa-search" aria-hidden="true"></i>
                  <input type="search" name="search" id="search" placeholder="Pets, Gender, Email, Name">
               </div>
            </div> -->


            <div class="account-items">

               <div class="acc-icons">
                  <div class="messages">
                     <i class="fa fa-comment" aria-hidden="true"></i>
                  </div>
                  <div class="notification">
                     <i class="fa fa-bell" aria-hidden="true"></i>
                  </div>
               </div>

               <div class="account-name-icon">
                  <div class="my-name"> 

                     <div class="admin-profile">
                        <img src="../assets/profile.jpg" alt="">
                     </div>  
                     <div class="text">
                        <h3> Welcome,  </h3>
                        <p> Mark Melvin E. Bacabis </p>
                     </div>

                     

                     <div class="drop-down">
                        <i class="fa fa-angle-down" aria-hidden="true"></i>   
                     </div>
                  </div>
               </div>
            </div>
         </header>
         <!-- XX HEADER -->

         <!-- CONTENT CONTAINER -->
         <div class="content-container">
            
            <div class="sections">
               
               <!-- DASHBOARD -->
               <section class="container cnt-dashboard isDisplay">
                  
                  <div class="dashboard-header">
      
                     <div class="title-wmy-container">
                        <div class="title-header">
                           <h1> 
                              Analytics Overview 
                              <span> <i class="fas fa-chart-line"> </i> </span>
                           </h1>
                        </div>
      
                        <div class="week-mos-yr">
                           <div class="wmy weekly-text">
                              <h3> Weekly </h3>
                           </div>
            
                           <div class="wmy monthly-text">
                              <h3> Monthly </h3>
                           </div>
            
                           <div class="wmy last-year-text">
                              <h3> Last Year </h3>
                           </div>
                        </div>
                     </div>
                  
                     <div class="card-container">
      
                        <div class="card-box">
                           <div class="card-title">
                              <p> Total Users </p>
      
                              <div class="card-icon">
                                 <i class="fa fa-users"></i>
                              </div>
                           </div>
      
                           <div class="card-total">
                              <h1> 251 </h1>
                           
                           </div>
                        </div>
      
                        <div class="card-box">
                           <div class="card-title">
                              <p> Total Users </p>
      
                              <div class="card-icon">
                                 <i class="fa fa-users"></i>
                              </div>
                           </div>
      
                           <div class="card-total">
                              <h1> 251 </h1>
                             
                           </div>
                        </div>
      
                        <div class="card-box">
                           <div class="card-title">
                              <p> Total Users </p>
      
                              <div class="card-icon">
                                 <i class="fa fa-users"></i>
                              </div>
                           </div>
      
                           <div class="card-total">
                              <h1> 251 </h1>
                             
                           </div>
                        </div>
      
                        <div class="card-box">
                           <div class="card-title">
                              <p> Total Users </p>
      
                              <div class="card-icon">
                                 <i class="fa fa-users"></i>
                              </div>
                           </div>
      
                           <div class="card-total">
                              <h1> 251 </h1>
                             
                           </div>
                        </div>
      
                     </div>
                  </div>
      
                  <div class="dashboard-content">
      
                     <div class="line-recent-container">
                        <div class="line-chart-box">
                           <div class="line-chart">
                              <canvas id="lineChart" height="100"> </canvas>
                           </div>
                        </div>
      
                        <div class="recent-act-box">
                           <h4> Scheduled Today <span> <i class="fa fa-list-ol" aria-hidden="true"></i></span></h4>
      
                           <div class="recent-activities">
      
                              <div class="activity">

                                 <div class="adopter-name">
                                    <div class="adopter-profile">
                                       <img src="../assets/profile.jpg">
                                    </div>
                                    <p> Mark Melvin E. Bacabis </p>
                                 </div>
      
                                 <div class="pet-info">
                                    <div class="pet-profile">
                                       <img src="../assets/Gallery-3.png">
                                    </div>
                                    <div class="pet-idname">
                                       <p> 012118 - <span> Kapola</span>  </p>
                                    </div>
                                 </div>
      
                                 <div class="status">
                                    <p> Pending </p>
                                 </div>
      
                                 <div class="action-button">
                                    <a href=""> View </a>
                                 </div>
                              </div>

                              <div class="activity">

                                 <div class="adopter-name">
                                    <div class="adopter-profile">
                                       <img src="../assets/profile.jpg">
                                    </div>
                                    <p> Mark Melvin E. Bacabis </p>
                                 </div>
      
                                 <div class="pet-info">
                                    <div class="pet-profile">
                                       <img src="../assets/Gallery-3.png">
                                    </div>
                                    <div class="pet-idname">
                                       <p> 012118 - <span> Kapola</span>  </p>
                                    </div>
                                 </div>
      
                                 <div class="status">
                                    <p> Pending </p>
                                 </div>
      
                                 <div class="action-button">
                                    <a href=""> View </a>
                                 </div>
                              </div>
      
      
                           </div>
      
                        </div>
                     </div>
      
                     <div class="pie-bar-container">
                        <div class="pie-charts-container">
                           <div class="pie-chart-box">
                              <div> 
                                 <canvas id="pieChart" width="250"> </canvas>
                              </div> 
                           </div>
      
                           <div class="donut-chart-box">
                              <div>
                                 <canvas id="doughnutChart" width="250"></canvas>
                              </div>
                           </div>
                        </div>
      
                        <div class="bar-graph-box">
                           <div class="bar-graph">
                              <canvas id="barGraph" height="100" ></canvas>
                           </div>
                        </div>
                     </div>
                  </div>
               </section>

               <!-- USERS -->
               <section class="container cnt-users"> 
                  <div class="users-header">
                     <div class="title-text">
                        <h1> Users </h1>
                        <i class="fa fa-users" aria-hidden="true"></i>
                     </div>

                     <div class="filter-box">
                        <div class="filter">
                           <div class="search">
                              <i class="fa fa-search"></i>
                              <input type="search" name="fil-search" id="fil-search" placeholder="Search...">
                           </div>
   
                           <div class="sort-by">
                              <p> Sort by </p>
   
                              <select name="sort-by" id="sort-by">
                                 <option value="UserId"> ID </option>
                                 <option value="Name"> Name </option>
                                 <option value="Email"> Email </option>
                                 <option value="Status"> Status </option>
                                 <option value="DateJoin"> Date Join </option>
                              </select>
                           </div>
                        </div>
                        
                        <div class="result">
                           <p> Showing <b> 10 </b> out of <b> 100 </b> entries </p>
                        </div>
                           
                     </div>

                  </div>
                  
                  <div class="user-item-container">
                     <div class="user-table">
                        <div class="col-name">
                           <div class="num"> # </div>
                           <div class="user-id"> User id </div>
                           <div class="user-name"> Name </div>
                           <div class="user-email"> Email </div>
                           <div class="user-status"> Mobile Number </div>
                           <div class="user-date-joined"> Date Joined </div>
                        </div>

                        <div class="row-item">

                        <!-- LOOP HERE  -->

                           <div class="row-user">
                              <div class="num"> 1 </div>
                              <div class="user-id"> 012118 </div>
                              <div class="user-name">
                                 <div class="user-profile">
                                    <img src="../assets/profile.jpg" alt="">
                                 </div>
                                 <p> Mark Melvin E. Bacabis </p>
                              </div>
                              <div class="user-email"> mark.melvin.bacabis@gmail.com </div>
                              <div class="user-status"> 09494463147 </div>
                              <div class="user-date-joined"> 7:22 PM - January 21, 2023  </div>
                           </div>

                           <div class="row-user">
                              <div class="num"> 1 </div>
                              <div class="user-id"> 012118 </div>
                              <div class="user-name">
                                 <div class="user-profile">
                                    <img src="../assets/profile.jpg" alt="">
                                 </div>
                                 <p> Mark Melvin E. Bacabis </p>
                              </div>
                              <div class="user-email"> mark.melvin.bacabis@gmail.com </div>
                              <div class="user-status"> 09494463147 </div>
                              <div class="user-date-joined"> 7:22 PM - January 21, 2023  </div>
                           </div>

                           <div class="row-user">
                              <div class="num"> 1 </div>
                              <div class="user-id"> 012118 </div>
                              <div class="user-name">
                                 <div class="user-profile">
                                    <img src="../assets/profile.jpg" alt="">
                                 </div>
                                 <p> Mark Melvin E. Bacabis </p>
                              </div>
                              <div class="user-email"> mark.melvin.bacabis@gmail.com </div>
                              <div class="user-status"> 09494463147 </div>
                              <div class="user-date-joined"> 7:22 PM - January 21, 2023  </div>
                           </div>

                           <div class="row-user">
                              <div class="num"> 1 </div>
                              <div class="user-id"> 012118 </div>
                              <div class="user-name">
                                 <div class="user-profile">
                                    <img src="../assets/profile.jpg" alt="">
                                 </div>
                                 <p> Mark Melvin E. Bacabis </p>
                              </div>
                              <div class="user-email"> mark.melvin.bacabis@gmail.com </div>
                              <div class="user-status"> 09494463147 </div>
                              <div class="user-date-joined"> 7:22 PM - January 21, 2023  </div>
                           </div>

                           <div class="row-user">
                              <div class="num"> 1 </div>
                              <div class="user-id"> 012118 </div>
                              <div class="user-name">
                                 <div class="user-profile">
                                    <img src="../assets/profile.jpg" alt="">
                                 </div>
                                 <p> Mark Melvin E. Bacabis </p>
                              </div>
                              <div class="user-email"> mark.melvin.bacabis@gmail.com </div>
                              <div class="user-status"> 09494463147 </div>
                              <div class="user-date-joined"> 7:22 PM - January 21, 2023  </div>
                           </div>

                           <div class="row-user">
                              <div class="num"> 1 </div>
                              <div class="user-id"> 012118 </div>
                              <div class="user-name">
                                 <div class="user-profile">
                                    <img src="../assets/profile.jpg" alt="">
                                 </div>
                                 <p> Mark Melvin E. Bacabis </p>
                              </div>
                              <div class="user-email"> mark.melvin.bacabis@gmail.com </div>
                              <div class="user-status"> 09494463147 </div>
                              <div class="user-date-joined"> 7:22 PM - January 21, 2023  </div>
                           </div>

                           <div class="row-user">
                              <div class="num"> 1 </div>
                              <div class="user-id"> 012118 </div>
                              <div class="user-name">
                                 <div class="user-profile">
                                    <img src="../assets/profile.jpg" alt="">
                                 </div>
                                 <p> Mark Melvin E. Bacabis </p>
                              </div>
                              <div class="user-email"> mark.melvin.bacabis@gmail.com </div>
                              <div class="user-status"> 09494463147 </div>
                              <div class="user-date-joined"> 7:22 PM - January 21, 2023  </div>
                           </div>

                           <div class="row-user">
                              <div class="num"> 1 </div>
                              <div class="user-id"> 012118 </div>
                              <div class="user-name">
                                 <div class="user-profile">
                                    <img src="../assets/profile.jpg" alt="">
                                 </div>
                                 <p> Mark Melvin E. Bacabis </p>
                              </div>
                              <div class="user-email"> mark.melvin.bacabis@gmail.com </div>
                              <div class="user-status"> 09494463147 </div>
                              <div class="user-date-joined"> 7:22 PM - January 21, 2023  </div>
                           </div>

                           <div class="row-user">
                              <div class="num"> 1 </div>
                              <div class="user-id"> 012118 </div>
                              <div class="user-name">
                                 <div class="user-profile">
                                    <img src="../assets/profile.jpg" alt="">
                                 </div>
                                 <p> Mark Melvin E. Bacabis </p>
                              </div>
                              <div class="user-email"> mark.melvin.bacabis@gmail.com </div>
                              <div class="user-status"> 09494463147 </div>
                              <div class="user-date-joined"> 7:22 PM - January 21, 2023  </div>
                           </div>

                           <div class="row-user">
                              <div class="num"> 1 </div>
                              <div class="user-id"> 012118 </div>
                              <div class="user-name">
                                 <div class="user-profile">
                                    <img src="../assets/profile.jpg" alt="">
                                 </div>
                                 <p> Mark Melvin E. Bacabis </p>
                              </div>
                              <div class="user-email"> mark.melvin.bacabis@gmail.com </div>
                              <div class="user-status"> 09494463147 </div>
                              <div class="user-date-joined"> 7:22 PM - January 21, 2023  </div>
                           </div>

                        </div>

                        <div class="numbering-item">
                           <p> next and previous </p>
                        </div>
                     </div>

                  </div>
               </section>

               <!-- ADMINS -->
               <section class="container cnt-admins"> 
                  <div class="admins-header">
                     <div class="title-text">
                        <div class="title">
                           <h1> Sub Admins </h1>
                           <i class="fa fa-users-cog" aria-hidden="true"></i>
                        </div>

                        <div class="admin-button">
                           <a href="#"> Add New Admin </a>
                        </div>
                     </div>

                     <div class="filter-box">
                        <div class="filter">
                           <div class="search">
                              <i class="fa fa-search"></i>
                              <input type="search" name="fil-search" id="fil-search" placeholder="Search...">
                           </div>
   
                           <div class="sort-by">
                              <p> Sort by </p>
   
                              <select name="sort-by" id="sort-by">
                                 <option value="AdminID"> Admin ID </option>
                                 <option value="Name"> Name </option>
                                 <option value="Email"> Email </option>
                                 <option value="Position"> Status </option>
                                 <option value="DateCreated"> Date Created </option>
                              </select>
                           </div>
                        </div>
                        
                        <div class="result">
                           <p> Showing <b> 10 </b> out of <b> 100 </b> entries </p>
                        </div>
                           
                     </div>

                  </div>
                  
                  <div class="admin-item-container">
                     <div class="admin-table">
                        <div class="col-name">
                           <div class="admin-num"> # </div>
                           <div class="admin-id"> User id </div>
                           <div class="admin-name"> Name </div>
                           <div class="admin-email"> Email </div>
                           <div class="admin-position"> Position </div>
                           <div class="admin-date-created"> Date Created </div>
                           <div class="admin-action"> Action </div>
                        </div>

                        <div class="row-item">

                        <!-- LOOP HERE  -->

                           <div class="row-admin">
                              <div class="admin-num"> 1 </div>
                              <div class="admin-id"> 012118 </div>
                              <div class="admin-name">
                                 <div class="admin-profile">
                                    <img src="../assets/profile.jpg" alt="">
                                 </div>
                                 <p> Mark Melvin E. Bacabis </p>
                              </div>
                              <div class="admin-email"> mark.melvin.bacabis@gmail.com </div>
                              <div class="admin-position"> Admin </div>
                              <div class="admin-date-created"> 7:22 PM - January 21, 2023  </div>

                              <div class="admin-action">
                                 <div class="edit-icon">
                                    <i class="fas fa-pen-alt"></i>
                                    <p> Edit </p>
                                 </div>
                              </div>
                           </div>


                        </div>

                        <div class="numbering-item">
                           <p> next and previous </p>
                        </div>
                     </div>

                  </div>
               </section>

               <!-- APPLICATIONS -->
               <section class="container cnt-applications"> 
                  <div class="appl-content-container">
                     <!-- SUB MENU -->
                     <div class="appl-sub-menu">
                        <h3> Adoption </h3>
                        <ul>
                           <li> 
                              <div class="sub-link appl-link appl-selected"> <p> Request </p> <i class="fas fa-users" aria-hidden="true"></i></div>
                           </li>
                           <li> 
                              <div class="sub-link appl-sched"> <p> Schedule </p> <i class="fas fa-calendar-alt    "></i> </div> 
                           </li>
                           <li> 
                              <div class="sub-link appl-interview"> <p> For Interview</p> <i class="fas fa-user-clock    "></i></div> 
                           </li>
                           <li> 
                              <div class="sub-link appl-arch"> <p> Archive </p> <i class="fas fa-archive    "></i></div> 
                           </li>
                     
                        </ul>
                     </div>
   
                     <!-- MAIN CONTAINER -->
                     <div class="appl-main-container">
   
                        <!-- APPLICANTS -->
                        <div class="sub-application appl sub-display">
                           <div class="appls-header">
                              <div class="title-text">
                                 <h1> Request </h1>
                                 <i class="fa fa-users" aria-hidden="true"></i>
                              </div>
                              <div class="filter-box">
                                 <div class="filter">
                                    <div class="search">
                                       <i class="fa fa-search"></i>
                                       <input type="search" name="fil-search" id="fil-search" placeholder="Search...">
                                    </div>
            
                                    <div class="sort-by">
                                       <p> Sort by </p>
            
                                       <select name="sort-by" id="sort-by">
                                          <option value="UserId"> ID </option>
                                          <option value="Name"> Name </option>
                                          <option value="Email"> Email </option>
                                          <option value="Status"> Status </option>
                                          <option value="DateJoin"> Date Join </option>
                                       </select>
                                    </div>
                                 </div>
                                 
                                 <div class="result">
                                    <p> Showing <b> 10 </b> out of <b> 100 </b> entries </p>
                                 </div>
                                    
                              </div>
                           </div>
                           
                           <div class="appl-item-container">
                              <div class="appl-table">
                                 <div class="col-name">
                                    <div class="appl-num"> # </div>
                                    <div class="appl-id"> Application No. </div>
                                    <div class="appl-name"> Name </div>
                                    <div class="appl-pet-id"> Pet ID </div>
                                    <div class="appl-pet-name"> Pet Name </div>
                                    <div class="appl-date-adoption"> Date of Application </div>
                                    <div class="appl-status"> Status </div>
                                    <div class="appl-action"> Action </div>
                                 </div>
         
                                 <div class="row-item">
         
                                 <!-- LOOP HERE  -->
         
                                    <div class="row-appl">
                                       <div class="appl-num"> 1 </div>
                                       <div class="appl-id"> 0AD130R12JND2 </div>
                                       <div class="appl-name">
                                          <div class="appl-profile">
                                             <img src="../assets/profile.jpg" alt="">
                                          </div>
                                          <p> Mark Melvin E. Bacabis </p>
                                       </div>
                                       <div class="appl-pet-id"> 012118 </div>
                                       <div class="appl-pet-name"> Kapola </div>
                                       <div class="appl-date-adoption"> Dec. 11, 2022 10:29AM</div>
                                       <div class="appl-status"> Pending </div>
                                       <div class="appl-action">
                                          <div class="edit-icon">
                                             <i class="fas fa-eye"></i>
                                             <p> View </p>
                                          </div>
                                       </div>
                                    </div>

                                    <div class="row-appl">
                                       <div class="appl-num"> 1 </div>
                                       <div class="appl-id"> 0AD130R12JND2 </div>
                                       <div class="appl-name">
                                          <div class="appl-profile">
                                             <img src="../assets/profile.jpg" alt="">
                                          </div>
                                          <p> Mark Melvin E. Bacabis </p>
                                       </div>
                                       <div class="appl-pet-id"> 012118 </div>
                                       <div class="appl-pet-name"> Kapola </div>
                                       <div class="appl-date-adoption"> Dec. 11, 2022 10:29AM</div>
                                       <div class="appl-status"> Pending </div>
                                       <div class="appl-action">
                                          <div class="edit-icon">
                                             <i class="fas fa-eye"></i>
                                             <p> View </p>
                                          </div>
                                       </div>
                                    </div>

                                    <div class="row-appl">
                                       <div class="appl-num"> 1 </div>
                                       <div class="appl-id"> 0AD130R12JND2 </div>
                                       <div class="appl-name">
                                          <div class="appl-profile">
                                             <img src="../assets/profile.jpg" alt="">
                                          </div>
                                          <p> Mark Melvin E. Bacabis </p>
                                       </div>
                                       <div class="appl-pet-id"> 012118 </div>
                                       <div class="appl-pet-name"> Kapola </div>
                                       <div class="appl-date-adoption"> Dec. 11, 2022 10:29AM</div>
                                       <div class="appl-status"> Pending </div>
                                       <div class="appl-action">
                                          <div class="edit-icon">
                                             <i class="fas fa-eye"></i>
                                             <p> View </p>
                                          </div>
                                       </div>
                                    </div>

                                    <div class="row-appl">
                                       <div class="appl-num"> 1 </div>
                                       <div class="appl-id"> 0AD130R12JND2 </div>
                                       <div class="appl-name">
                                          <div class="appl-profile">
                                             <img src="../assets/profile.jpg" alt="">
                                          </div>
                                          <p> Mark Melvin E. Bacabis </p>
                                       </div>
                                       <div class="appl-pet-id"> 012118 </div>
                                       <div class="appl-pet-name"> Kapola </div>
                                       <div class="appl-date-adoption"> Dec. 11, 2022 10:29AM</div>
                                       <div class="appl-status"> Pending </div>
                                       <div class="appl-action">
                                          <div class="edit-icon">
                                             <i class="fas fa-eye"></i>
                                             <p> View </p>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="row-appl">
                                       <div class="appl-num"> 1 </div>
                                       <div class="appl-id"> 0AD130R12JND2 </div>
                                       <div class="appl-name">
                                          <div class="appl-profile">
                                             <img src="../assets/profile.jpg" alt="">
                                          </div>
                                          <p> Mark Melvin E. Bacabis </p>
                                       </div>
                                       <div class="appl-pet-id"> 012118 </div>
                                       <div class="appl-pet-name"> Kapola </div>
                                       <div class="appl-date-adoption"> Dec. 11, 2022 10:29AM</div>
                                       <div class="appl-status"> Pending </div>
                                       <div class="appl-action">
                                          <div class="edit-icon">
                                             <i class="fas fa-eye"></i>
                                             <p> View </p>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="row-appl">
                                       <div class="appl-num"> 1 </div>
                                       <div class="appl-id"> 0AD130R12JND2 </div>
                                       <div class="appl-name">
                                          <div class="appl-profile">
                                             <img src="../assets/profile.jpg" alt="">
                                          </div>
                                          <p> Mark Melvin E. Bacabis </p>
                                       </div>
                                       <div class="appl-pet-id"> 012118 </div>
                                       <div class="appl-pet-name"> Kapola </div>
                                       <div class="appl-date-adoption"> Dec. 11, 2022 10:29AM</div>
                                       <div class="appl-status"> Pending </div>
                                       <div class="appl-action">
                                          <div class="edit-icon">
                                             <i class="fas fa-eye"></i>
                                             <p> View </p>
                                          </div>
                                       </div>
                                    </div>
                                    
                                 </div>
         
         
                                 <div class="numbering-item">
                                    <p> next and previous </p>
                                 </div>
                              </div>
         
                           </div>
                        </div>
   
                        <!-- SCHEDULE -->
                        <div class="sub-application sched">
                           <div class="scheds-header">
                              <div class="title-text">
                                 <h1> Set Schedule </h1>
                                 <i class="fa fa-calendar" aria-hidden="true"></i>
                              </div>
                              <div class="filter-box">
                                 <div class="filter">
                                    <div class="search">
                                       <i class="fa fa-search"></i>
                                       <input type="search" name="fil-search" id="fil-search" placeholder="Search...">
                                    </div>
            
                                    <div class="sort-by">
                                       <p> Sort by </p>
            
                                       <select name="sort-by" id="sort-by">
                                          <option value="UserId"> ID </option>
                                          <option value="Name"> Name </option>
                                          <option value="Email"> Email </option>
                                          <option value="Status"> Status </option>
                                          <option value="DateJoin"> Date Join </option>
                                       </select>
                                    </div>
                                 </div>
                                 
                                 <div class="result">
                                    <p> Showing <b> 10 </b> out of <b> 100 </b> entries </p>
                                 </div>
                                    
                              </div>
                           </div>
                           
                           <div class="sched-item-container">
                              <div class="sched-table">
                                 <div class="col-name">
                                    <div class="sched-num"> # </div>
                                    <div class="sched-id"> Application No. </div>
                                    <div class="sched-name"> Name </div>
                                    <div class="sched-pet-id"> Pet ID </div>
                                    <div class="sched-pet-name"> Pet Name </div>
                                    <div class="sched-date-set"> Set Schedule </div>
                                    <div class="sched-status"> Status </div>
                                    <div class="sched-action"> Action </div>
                                 </div>
         
                                 <div class="row-item">
         
                                 <!-- LOOP HERE  -->
         
                                    <div class="row-sched">
                                       <div class="sched-num"> 1 </div>
                                       <div class="sched-id"> 0AD130R12JND2 </div>
                                       <div class="sched-name">
                                          <div class="sched-profile">
                                             <img src="../assets/profile.jpg" alt="">
                                          </div>
                                          <p> Mark Melvin E. Bacabis </p>
                                       </div>
                                       <div class="sched-pet-id"> 012118 </div>
                                       <div class="sched-pet-name"> Kapola </div>
                                       <div class="sched-date-set">
                                          <input type="datetime-local" name="" id="">
                                       </div>
                                       <div class="sched-status"> For Schedule </div>
                                       <div class="sched-action">
                                          <div class="edit-icon">
                                             <i class="fas fa-paper-plane"></i>
                                             <p> Send </p>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
         
         
                                 <div class="numbering-item">
                                    <p> next and previous </p>
                                 </div>
                              </div>
         
                           </div>
                        </div>
   
                        <!-- FOR INTERVIEW -->
                        <div class="sub-application f-int">
                           <div class="f-ints-header">
                              <div class="title-text">
                                 <h1> For Interview </h1>
                                 <i class="fa fa-user-clock"></i>
                              </div>
                              <div class="filter-box">
                                 <div class="filter">
                                    <div class="search">
                                       <i class="fa fa-search"></i>
                                       <input type="search" name="fil-search" id="fil-search" placeholder="Search...">
                                    </div>
            
                                    <div class="sort-by">
                                       <p> Sort by </p>
            
                                       <select name="sort-by" id="sort-by">
                                          <option value="UserId"> ID </option>
                                          <option value="Name"> Name </option>
                                          <option value="Email"> Email </option>
                                          <option value="Status"> Status </option>
                                          <option value="DateJoin"> Date Join </option>
                                       </select>
                                    </div>
                                 </div>
                                 
                                 <div class="result">
                                    <p> Showing <b> 10 </b> out of <b> 100 </b> entries </p>
                                 </div>
                                    
                              </div>
                           </div>
                           
                           <div class="f-int-item-container">
                              <div class="f-int-table">
                                 <div class="col-name">
                                    <div class="f-int-num"> # </div>
                                    <div class="f-int-id"> Application No. </div>
                                    <div class="f-int-name"> Name </div>
                                    <div class="f-int-pet-id"> Pet ID </div>
                                    <div class="f-int-pet-name"> Pet Name </div>
                                    <div class="f-int-date-interview"> Date of Interview </div>
                                    <div class="f-int-status"> Status </div>
                                    <div class="f-int-action"> Action </div>
                                 </div>
         
                                 <div class="row-item">
         
                                 <!-- LOOP HERE  -->
         
                                    <div class="row-f-int">
                                       <div class="f-int-num"> 1 </div>
                                       <div class="f-int-id"> 0AD130R12JND2 </div>
                                       <div class="f-int-name">
                                          <div class="f-int-profile">
                                             <img src="../assets/profile.jpg" alt="">
                                          </div>
                                          <p> Mark Melvin E. Bacabis </p>
                                       </div>
                                       <div class="f-int-pet-id"> 012118 </div>
                                       <div class="f-int-pet-name"> Kapola </div>
                                       <div class="f-int-date-interview"> Dec. 11, 2022 10:29AM</div>
                                       <div class="f-int-status"> For Interview </div>
                                       <div class="f-int-action">
                                          <div class="edit-icon">
                                             <i class="fas fa-pen-alt"></i>
                                             <p> Edit </p>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
         
         
                                 <div class="numbering-item">
                                    <p> next and previous </p>
                                 </div>
                              </div>
         
                           </div>
                        </div>

                        <!-- ARCHIVE -->
                        <div class="sub-application appl-archive">
                           <div class="appl-archives-header">
                              <div class="title-text">
                                 <h1> Archive </h1>
                                 <i class="fa fa-archive" aria-hidden="true"></i>
                              </div>
                              <div class="filter-box">
                                 <div class="filter">
                                    <div class="search">
                                       <i class="fa fa-search"></i>
                                       <input type="search" name="fil-search" id="fil-search" placeholder="Search...">
                                    </div>
            
                                    <div class="sort-by">
                                       <p> Sort by </p>
            
                                       <select name="sort-by" id="sort-by">
                                          <option value="UserId"> ID </option>
                                          <option value="Name"> Name </option>
                                          <option value="Email"> Email </option>
                                          <option value="Status"> Status </option>
                                          <option value="DateJoin"> Date Join </option>
                                       </select>
                                    </div>
                                 </div>
                                 
                                 <div class="result">
                                    <p> Showing <b> 10 </b> out of <b> 100 </b> entries </p>
                                 </div>
                                    
                              </div>
                           </div>
                           
                           <div class="appl-archive-item-container">
                              <div class="appl-archive-table">
                                 <div class="col-name">
                                    <div class="appl-archive-num"> # </div>
                                    <div class="appl-archive-id"> Application No. </div>
                                    <div class="appl-archive-name"> Name </div>
                                    <div class="appl-archive-pet-id"> Pet ID </div>
                                    <div class="appl-archive-pet-name"> Pet Name </div>
                                    <div class="appl-archive-date-interview"> Date of Adoption </div>
                                    <div class="appl-archive-status"> Status </div>
                                    <div class="appl-archive-action"> Action </div>
                                 </div>
         
                                 <div class="row-item">
         
                                 <!-- LOOP HERE  -->
         
                                    <div class="row-appl-archive">
                                       <div class="appl-archive-num"> 1 </div>
                                       <div class="appl-archive-id"> 0AD130R12JND2 </div>
                                       <div class="appl-archive-name">
                                          <div class="appl-archive-profile">
                                             <img src="../assets/profile.jpg" alt="">
                                          </div>
                                          <p> Mark Melvin E. Bacabis </p>
                                       </div>
                                       <div class="appl-archive-pet-id"> 012118 </div>
                                       <div class="appl-archive-pet-name"> Kapola </div>
                                       <div class="appl-archive-date-interview"> Dec. 11, 2022 10:29AM</div>
                                       <div class="appl-archive-status"> Pending </div>
                                       <div class="appl-archive-action">
                                          <div class="edit-icon">
                                             <i class="fas fa-pen-alt"></i>
                                             <p> Edit </p>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
         
         
                                 <div class="numbering-item">
                                    <p> next and previous </p>
                                 </div>
                              </div>
         
                           </div>
                        </div>
   
                     </div>
               </section>
               
               <!-- SERVICES -->
               <section class="container cnt-services"> 
                     <div class="services-content-container">
                        <div class="services-sub-menu">
                           <h3> SERVICES </h3>
                           <ul>
                              <li> 
                                 <div class="services-sub-link services-link services-selected"> <p> Applicants </p> <i class="fas fa-users" aria-hidden="true"></i></div>
                              </li>
                              <li> 
                                 <div class="services-sub-link services-sched"> <p> Services </p> <i class="fas fa-calendar-check   "></i> </div> 
                              </li>
                              
                              <li> 
                                 <div class="services-sub-link services-link "> <p> Manage Services </p> <i class="fas fa-cog" aria-hidden="true"></i></div>
                              </li>
                              <li> 
                                 <div class="services-sub-link services-arch"> <p> Archive </p> <i class="fas fa-archive    "></i></div> 
                              </li>
                           </ul>
                           
                        </div>

                        <div class="services-main-container">
                           <!-- Request -->
                           <div class="sub-services service-request sub-services-display">
                              <div class="service-requests-header">
                                 <div class="title-text">
                                    <h1> Applicants </h1>
                                    <i class="fa fa-users" aria-hidden="true"></i>
                                 </div>
                                 <div class="filter-box">
                                    <div class="filter">
                                       <div class="search">
                                          <i class="fa fa-search"></i>
                                          <input type="search" name="fil-search" id="fil-search" placeholder="Search...">
                                       </div>
               
                                       <div class="sort-by">
                                          <p> Sort by </p>
               
                                          <select name="sort-by" id="sort-by">
                                             <option value="UserId"> ID </option>
                                             <option value="Name"> Name </option>
                                             <option value="Email"> Email </option>
                                             <option value="Status"> Status </option>
                                             <option value="DateJoin"> Date Join </option>
                                          </select>
                                       </div>
                                    </div>
                                    
                                    <div class="result">
                                       <p> Showing <b> 10 </b> out of <b> 100 </b> entries </p>
                                    </div>
                                       
                                 </div>
                              </div>
                              
                              <div class="service-request-item-container">
                                 <div class="service-request-table">
                                    <div class="col-name">
                                       <div class="service-request-num"> # </div>
                                       <div class="service-request-id"> Service No. </div>
                                       <div class="service-request-name"> Name </div>
                                       
                                       <div class="service-request-pet-name"> Pet Name </div>
                                       <div class="service-request-date-adoption"> Date of Application </div>
                                       <div class="service-request-status"> Services </div>
                                       <div class="service-request-set-date"> Schedule </div>
                                       <div class="service-request-action"> Action </div>
                                    </div>
            
                                    <div class="row-item">
            
                                    <!-- LOOP HERE  -->
            
                                       <div class="row-service-request">
                                          <div class="service-request-num"> 1 </div>
                                          <div class="service-request-id"> DE2023001 </div>
                                          <div class="service-request-name">
                                             <div class="service-request-profile">
                                                <img src="../assets/profile.jpg" alt="">
                                             </div>
                                             <p> Mark Melvin E. Bacabis </p>
                                          </div>
                              
                                          <div class="service-request-pet-name"> Kapola </div>
                                          <div class="service-request-date-adoption"> Dec. 11, 2022 10:29AM</div>
                                          <div class="service-request-status"> Deworming </div>
                                          <div class="service-request-set-date">
                                             February
                                          </div>
                                          <div class="service-request-action">
                                             <div class="edit-icon">
                                                <i class="fas fa-paper-plane"></i>
                                                <p> Send </p>
                                             </div>
                                          </div>
                                       </div>
                        
                                    </div>
            
            
                                    <div class="numbering-item">
                                       <p> next and previous </p>
                                    </div>
                                 </div>
            
                              </div>
                              
                           </div>

                           <div class="sub-services">

                           </div>
                           <div class="sub-services">

                           </div>
                           <div class="sub-services">

                           </div>
                           <div class="sub-services">

                           </div>

                        </div>
                     </div>
               </section>
      
               <section class="container cnt-pets"> 
                  <p> PETS CONTENT HERE </p>
               </section>
      
               <!-- <section class="container cnt-donations"> 
                  <p> DONATIONS CONTENT HERE </p>
               </section>
      
               <section class="container cnt-reports"> 
                  <p> REPORTS CONTENT HERE </p>
               </section> -->

               <!-- ARCHIVE -->
               <section class="container cnt-archive"> 
               <div class="archive-header">
                     <div class="title-text">
                        <h1> Users </h1>
                        <i class="fa fa-archive" aria-hidden="true"></i>
                     </div>

                     <div class="filter-box">
                        <div class="filter">
                           <div class="search">
                              <i class="fa fa-search"></i>
                              <input type="search" name="fil-search" id="fil-search" placeholder="Search...">
                           </div>
   
                           <div class="sort-by">
                              <p> Sort by </p>
   
                              <select name="sort-by" id="sort-by">
                                 <option value="UserId"> ID </option>
                                 <option value="Name"> Name </option>
                                 <option value="Email"> Email </option>
                                 <option value="Status"> Status </option>
                                 <option value="DateJoin"> Date Join </option>
                              </select>
                           </div>
                        </div>
                        
                        <div class="result">
                           <p> Showing <b> 10 </b> out of <b> 100 </b> entries </p>
                        </div>
                           
                     </div>

                  </div>
                  
                  <div class="archive-item-container">
                     <div class="archive-table">
                        <div class="col-name">
                           <div class="num"> # </div>
                           <div class="archive-id"> User id </div>
                           <div class="archive-name"> Name </div>
                           <div class="archive-email"> Email </div>
                           <div class="archive-status"> Mobile Number </div>
                           <div class="archive-date-joined"> Date Joined </div>
                        </div>

                        <div class="row-item">

                        <!-- LOOP HERE  -->

                           <div class="row-archive">
                              <div class="num"> 1 </div>
                              <div class="archive-id"> 012118 </div>
                              <div class="archive-name">
                                 <div class="archive-profile">
                                    <img src="../assets/profile.jpg" alt="">
                                 </div>
                                 <p> Mark Melvin E. Bacabis </p>
                              </div>
                              <div class="archive-email"> mark.melvin.bacabis@gmail.com </div>
                              <div class="archive-status"> 09494463147 </div>
                              <div class="archive-date-joined"> 7:22 PM - January 21, 2023  </div>
                           </div>

                           <div class="row-archive">
                              <div class="num"> 1 </div>
                              <div class="archive-id"> 012118 </div>
                              <div class="archive-name">
                                 <div class="archive-profile">
                                    <img src="../assets/profile.jpg" alt="">
                                 </div>
                                 <p> Mark Melvin E. Bacabis </p>
                              </div>
                              <div class="archive-email"> mark.melvin.bacabis@gmail.com </div>
                              <div class="archive-status"> 09494463147 </div>
                              <div class="archive-date-joined"> 7:22 PM - January 21, 2023  </div>
                           </div>

                           <div class="row-archive">
                              <div class="num"> 1 </div>
                              <div class="archive-id"> 012118 </div>
                              <div class="archive-name">
                                 <div class="archive-profile">
                                    <img src="../assets/profile.jpg" alt="">
                                 </div>
                                 <p> Mark Melvin E. Bacabis </p>
                              </div>
                              <div class="archive-email"> mark.melvin.bacabis@gmail.com </div>
                              <div class="archive-status"> 09494463147 </div>
                              <div class="archive-date-joined"> 7:22 PM - January 21, 2023  </div>
                           </div>

                           <div class="row-archive">
                              <div class="num"> 1 </div>
                              <div class="archive-id"> 012118 </div>
                              <div class="archive-name">
                                 <div class="archive-profile">
                                    <img src="../assets/profile.jpg" alt="">
                                 </div>
                                 <p> Mark Melvin E. Bacabis </p>
                              </div>
                              <div class="archive-email"> mark.melvin.bacabis@gmail.com </div>
                              <div class="archive-status"> 09494463147 </div>
                              <div class="archive-date-joined"> 7:22 PM - January 21, 2023  </div>
                           </div>

                           <div class="row-archive">
                              <div class="num"> 1 </div>
                              <div class="archive-id"> 012118 </div>
                              <div class="archive-name">
                                 <div class="archive-profile">
                                    <img src="../assets/profile.jpg" alt="">
                                 </div>
                                 <p> Mark Melvin E. Bacabis </p>
                              </div>
                              <div class="archive-email"> mark.melvin.bacabis@gmail.com </div>
                              <div class="archive-status"> 09494463147 </div>
                              <div class="archive-date-joined"> 7:22 PM - January 21, 2023  </div>
                           </div>

                        </div>

                        <div class="numbering-item">
                           <p> next and previous </p>
                        </div>
                     </div>

                  </div>
               </section>
      
               <section class="container cnt-settings"> 
                  <p> SETTINGS CONTENT HERE </p>
               </section>
            </div>
         </div>

      </div>


      <!-- RIGHT PANEL -->
      <!-- <div class="right-navigation">
         <p> NOTIFICATION AND ACCOUNT </p>
      </div> -->


   </main>
</body>

<!-- Custom Script -->
<script src="./js/script.js"> </script>
<script src="./js/appl.js"> </script>
<script src="./js/service.js"> </script>

<!-- Chart Js CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.2.0/dist/chart.umd.min.js"></script>

<script src="./js/charts/lineChart.js"></script>
<script src="./js/charts/pieChart.js"></script>
<script src="./js/charts/doughnut.js"></script>
<script src="./js/charts/barGraph.js"></script>



</html>