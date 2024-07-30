<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    @stack("links")
</head>
<body>
    <nav>
        <div>
            <svg class="icon" width="261.3" height="23.131116601551657" viewBox="0 0 350 30.983125949265517" class="css-1j8o68f"><defs id="SvgjsDefs1094"></defs><g id="SvgjsG1095" featurekey="nameFeature-0" transform="matrix(0.82794325822325,0,0,0.82794325822325,-1.6170560482250165,-1.035096465481874)" fill="#222222"><path d="M30.703 38.5937 l7.0313 0 l-13.594 -37.266 l-7.1094 0 l7.8906 22.266 z M1.9531 38.5937 l6.875 0 l8.125 -19.844 l-3.3594 -8.9063 z M72.813 27.344 c-0.98961 2.3959 -2.3438 4.375 -4.0625 5.9375 c-1.7709 1.6666 -3.8542 2.9688 -6.2501 3.9063 s-5.0781 1.4063 -8.0469 1.4063 l-8.6719 0 l0 -5.9375 l8.5938 0 c1.9791 0 3.776 -0.3125 5.3906 -0.9375 c1.5625 -0.625 2.9166 -1.5104 4.0625 -2.6563 s2.0313 -2.5 2.6563 -4.0625 s0.9375 -3.2813 0.9375 -5.1563 c0 -1.8229 -0.3125 -3.5156 -0.9375 -5.0781 c-0.625 -1.6146 -1.5104 -2.9427 -2.6563 -3.9844 c-1.0416 -1.0938 -2.3958 -1.9791 -4.0624 -2.6563 c-1.6666 -0.625 -3.4635 -0.9375 -5.3906 -0.9375 l-8.5938 0 l0 -5.9375 l8.6719 0 c2.7604 0 5.4166 0.49477 7.9688 1.4844 c2.3959 0.88539 4.5052 2.2135 6.3281 3.9844 c1.7709 1.6146 3.125 3.5938 4.0625 5.9375 c0.98961 2.3959 1.4844 4.8438 1.4844 7.3438 c0 2.7084 -0.49477 5.1563 -1.4844 7.3438 z M111.953 38.5937 l6.5625 0 l0 -27.422 l-6.5625 9.6094 l0 17.813 z M118.51599999999999 1.4059999999999988 l-7.0313 0 l-11.484 17.813 l-11.406 -17.813 l-7.0313 0 l0 37.188 l6.5625 0 l0 -26.406 l11.719 17.578 l0.23438 0 l10.234 -15.156 c0.052109 -0.20836 2.7865 -4.6094 8.2031 -13.203 z M143.281 16.875 l0 -15.547 l-6.5625 0 l0 37.344 l6.5625 0 l0 -21.797 z M163.8281 38.5937 l6.4844 0 l0 -19.922 l-6.4844 -9.1406 l0 29.063 z M189.766 1.4059999999999988 l0 25.703 l-18.359 -25.703 l-7.0313 0 l26.406 37.188 l5.3906 0 l0 -37.188 l-6.4063 0 z  M265.15675 8.75 c-0.67711 -1.4584 -1.6147 -2.7605 -2.8126 -3.9063 c-1.25 -1.0938 -2.7344 -1.9531 -4.4531 -2.5781 c-1.875 -0.57289 -3.8541 -0.85938 -5.9375 -0.85938 l-14.609 0 l0 5.8594 l14.063 0 c2.3438 0 4.2969 0.57289 5.8594 1.7188 c1.4584 1.0938 2.1875 2.7604 2.1875 5 c0 2.0313 -0.70313 3.6719 -2.1094 4.9219 c-1.5104 1.1979 -3.4895 1.7969 -5.9374 1.7969 l-14.063 0 l0 17.891 l6.4844 0 l0 -11.953 l7.3438 0 c1.9271 0 3.8802 -0.28648 5.8594 -0.85938 c1.8229 -0.57289 3.3854 -1.3802 4.6875 -2.4218 c1.3541 -1.0416 2.4219 -2.3698 3.2031 -3.9844 c0.78125 -1.5625 1.1719 -3.3854 1.1719 -5.4688 c0 -1.9791 -0.3125 -3.6979 -0.9375 -5.1563 z M302.42175 38.5937 l7.0313 0 l-13.594 -37.266 l-7.1094 0 l7.8906 22.266 z M273.67185 38.5937 l6.875 0 l8.125 -19.844 l-3.3594 -8.9063 z M315.54685 38.5937 l6.4844 0 l0 -19.922 l-6.4844 -9.1406 l0 29.063 z M341.48475 1.4059999999999988 l0 25.703 l-18.359 -25.703 l-7.0313 0 l26.406 37.188 l5.3906 0 l0 -37.188 l-6.4063 0 z M357.81255 1.4059999999999988 l27.813 0 l0 5.9375 l-27.813 0 l0 -5.9375 z M357.81255 32.6562 l27.734 0 l0 5.9375 l-27.734 0 l0 -5.9375 z M357.81255 16.875 l25.078 0 l0 5.8594 l-25.078 0 l0 -5.8594 z M398.75005 1.4059999999999988 l6.4063 0 l0 31.25 l19.531 0 l0 5.9375 l-25.938 0 l0 -37.188 z"></path></g></svg>
        </div>
        <div class="welcome-exit-section">
            <h1 class="welcome-text">Welcome Admin</h1>
        </div>
    </nav>
    <div class="main_content">
        <div class="sidebar">
            <div class="sidebar_content">
                <h1 class="sideheading">Menu</h1>
                <div class="sidelinks">
                    <a href=""><i class="fa-solid fa-gear"></i> Site settings</a>
                    <a href=""><i class="fa-solid fa-cart-shopping"></i> Orders</a>
                    <a href="">Lorem ipsum dolor sit.</a>
                </div>
                    <a href="#" onclick="window.close();return false;" class="close_btn"><i class="fa-solid fa-arrow-right-from-bracket"></i> Exit</a>
            </div>
        </div>
        <div class="orders_section">
            <div class="orders_table">
                <h2 class="table_heading">Orders</h2>
                <table>
                    <tr>
                        <th>#</th>
                        <th>Avatar</th>
                        <th>id</th>
                        <th>name</th>
                        <th>product</th>
                        <th>quantity</th>
                        <th>status</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td><img src="img/men.jpg" alt="Avatar" class="profile_pic"></td>
                        <td>3254</td>
                        <td>XYZ</td>
                        <td>Mouse</td>
                        <td>2</td>
                        <td><div class="status">complete</div></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td><img src="img/men.jpg" alt="Avatar" class="profile_pic"></td>
                        <td>6584</td>
                        <td>ABC</td>
                        <td>Airpod</td>
                        <td>1</td>
                        <td><div class="status">complete</div></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td><img src="img/men.jpg" alt="Avatar" class="profile_pic"></td>
                        <td>9876</td>
                        <td>ABC</td>
                        <td>Airpod</td>
                        <td>1</td>
                        <td><div class="status pending">pending</div></td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td><img src="img/men.jpg" alt="Avatar" class="profile_pic"></td>
                        <td>3254</td>
                        <td>XYZ</td>
                        <td>Mouse</td>
                        <td>2</td>
                        <td><div class="status">complete</div></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td><img src="img/men.jpg" alt="Avatar" class="profile_pic"></td>
                        <td>6584</td>
                        <td>ABC</td>
                        <td>Airpod</td>
                        <td>1</td>
                        <td><div class="status">complete</div></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td><img src="img/men.jpg" alt="Avatar" class="profile_pic"></td>
                        <td>9876</td>
                        <td>ABC</td>
                        <td>Airpod</td>
                        <td>1</td>
                        <td><div class="status pending">pending</div></td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td><img src="img/men.jpg" alt="Avatar" class="profile_pic"></td>
                        <td>3254</td>
                        <td>XYZ</td>
                        <td>Mouse</td>
                        <td>2</td>
                        <td><div class="status">complete</div></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td><img src="img/men.jpg" alt="Avatar" class="profile_pic"></td>
                        <td>6584</td>
                        <td>ABC</td>
                        <td>Airpod</td>
                        <td>1</td>
                        <td><div class="status">complete</div></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td><img src="img/men.jpg" alt="Avatar" class="profile_pic"></td>
                        <td>9876</td>
                        <td>ABC</td>
                        <td>Airpod</td>
                        <td>1</td>
                        <td><div class="status pending">pending</div></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</body>
</html>