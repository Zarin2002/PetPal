@extends('layouts.app')

@section('content')
<div class="vet-container">
    <h1 class="neon-text">🐾 Vet Finder & Booking 🐶🐱</h1>
    <p class="subtext">Find the best veterinarians near you and book an appointment instantly.</p>

    <!-- Floating Paws -->
    <div class="floating-paw paw-top-left">🐾</div>
    <div class="floating-paw paw-top-right">🐾</div>
    <div class="floating-paw paw-bottom-left">🐾</div>
    <div class="floating-paw paw-bottom-right">🐾</div>

    <div class="vet-grid">
        <!-- Example Vet Clinic 1 -->
        <div class="vet-card">
            <img src="https://media.licdn.com/dms/image/v2/D5612AQHsHZPwXfG8Ng/article-cover_image-shrink_720_1280/B56ZhVGsnCHkAI-/0/1753774476374?e=2147483647&v=beta&t=bANUCpB5I86j7okDN_rvc7SryP3i1G9O1n1Zbfz9RIE" alt="Happy Paws" class="vet-img">
            <h3>Happy Paws Veterinary Clinic 🐾</h3>
            <p>📍 123 Pet Street, Cityville</p>
            <p>⭐ 4.8 / 5 <span class="paws">🐾🐾🐾🐾🐾</span> (120 reviews)</p>
            <button class="book-btn" onclick="openBookingModal('Happy Paws Veterinary Clinic 🐾')">Book Appointment 🗓️</button>
        </div>

        <!-- Example Vet Clinic 2 -->
        <div class="vet-card">
            <img src="https://tploinfo.com/wp-content/uploads/2021/11/glen-carrie-DEOitCl9mtg-unsplash.jpg" alt="Pawfect Care" class="vet-img">
            <h3>Pawfect Care Animal Hospital 🐕🐈</h3>
            <p>📍 456 Furry Lane, Petland</p>
            <p>⭐ 4.6 / 5 <span class="paws">🐾🐾🐾🐾</span> (98 reviews)</p>
            <button class="book-btn" onclick="openBookingModal('Pawfect Care Animal Hospital 🐕🐈')">Book Appointment 🗓️</button>
        </div>

        <!-- Example Vet Clinic 3 -->
        <div class="vet-card">
            <img src="https://www.thedogclinic.com/wp-content/uploads/2023/06/dog-tail-meaning.jpg" alt="Healing Tails" class="vet-img">
            <h3>Healing Tails Vet Center 🐶💖</h3>
            <p>📍 789 Woof Avenue, Dogtown</p>
            <p>⭐ 4.9 / 5 <span class="paws">🐾🐾🐾🐾🐾</span> (150 reviews)</p>
            <button class="book-btn" onclick="openBookingModal('Healing Tails Vet Center 🐶💖')">Book Appointment 🗓️</button>
        </div>

        <!-- Example Vet Clinic 4 -->
        <div class="vet-card">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSviV1ZVCGtNPw8iLAIMI-l8AmZwqqUvCfUCcaaV1NNwnUdcz9ExLxEfA2LQ3pysKOglNU&usqp=CAU" alt="Bird Haven Vet" class="vet-img">
            <h3>Bird Haven Veterinary Clinic 🦜</h3>
            <p>📍 321 Feather Lane, Aviary City</p>
            <p>⭐ 4.7 / 5 <span class="paws">🦜🦜🦜🦜🦜</span> (85 reviews)</p>
            <button class="book-btn" onclick="openBookingModal('Bird Haven Veterinary Clinic 🦜')">Book Appointment 🗓️</button>
        </div>

        <!-- Example Vet Clinic 5 -->
        <div class="vet-card">
           <img src="https://iahcf.com/uploads/SiteAssets/807/images/services/exotic-pets-integrative-animal-hospital-of-central-florida.jpg" alt="Exotic Pet Care" class="vet-img">
           <h3>Exotic Pet Care Center 🐢🐍</h3>
           <p>📍 654 Jungle Street, Reptile Town</p>
           <p>⭐ 4.8 / 5 <span class="paws">🐢🐢🐢🐢🐢</span> (92 reviews)</p>
           <button class="book-btn" onclick="openBookingModal('Exotic Pet Care Center 🐢🐍')">Book Appointment 🗓️</button>
        </div>

        <!-- Example Vet Clinic 6 -->
        <div class="vet-card">
           <img src="https://media.istockphoto.com/id/1297963192/photo/close-up-of-cute-baby-rabbit.jpg?s=612x612&w=0&k=20&c=TuRZKZXZ9ejOWf_IRu2uSdHPzdzqnv3eTw_N6OQ7sQ8=" alt="Small Animal Clinic" class="vet-img">
           <h3>Small Animal Clinic 🐇🐹</h3>
           <p>📍 987 Cuddly Lane, Petborough</p>
           <p>⭐ 4.9 / 5 <span class="paws">🐇🐇🐇🐇🐇</span> (110 reviews)</p>
           <button class="book-btn" onclick="openBookingModal('Small Animal Clinic 🐇🐹')">Book Appointment 🗓️</button>
        </div>

    
        <div class="vet-card">
         <img src="data:image/jpeg;base64,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" alt="Hamster Haven Vet" class="vet-img">
         <h3>Hamster Haven Vet 🐹</h3>
         <p>📍 111 Tiny Paw Street, Hamsterville</p>
         <p>⭐ 4.7 / 5 <span class="paws">🐹🐹🐹🐹🐹</span> (75 reviews)</p>
         <button class="book-btn" onclick="openBookingModal('Hamster Haven Vet 🐹')">Book Appointment 🗓️</button>
        </div>

    <!-- Example Vet Clinic 8 -->
        <div class="vet-card">
         <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTOWInoReTpzDWb0XWfJy1aHXMW5d8zEQEQgQ&s" alt="Aquatic Care Vet" class="vet-img">
         <h3>Aquatic Care Vet 🐠</h3>
         <p>📍 222 Fish Lane, Aquaville</p>
         <p>⭐ 4.6 / 5 <span class="paws">🐠🐠🐠🐠🐠</span> (60 reviews)</p>
         <button class="book-btn" onclick="openBookingModal('Aquatic Care Vet 🐠')">Book Appointment 🗓️</button>
        </div>

    <!-- Example Vet Clinic 9 -->
        <div class="vet-card">
         <img src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBxITEhUQEhIVFhUXFhUVFRcWFxYWFRcXFxUYGBYWFRUYHiggGBolGxUWIjEhJSkrLi4uFx8zODUtNygtLisBCgoKDg0OGxAQGy0lICUtLS0tLS0tLS0vLS0tLS0tLS0tLy0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLf/AABEIALcBEwMBIgACEQEDEQH/xAAbAAACAwEBAQAAAAAAAAAAAAAEBQACAwYBB//EADwQAAIBAwMCBAQEBAYCAgMBAAECEQADIQQSMQVBEyJRYQYycYEjQpGhUmKxwRQz0eHw8XKCFZIkQ1MH/8QAGQEAAwEBAQAAAAAAAAAAAAAAAQIDAAQF/8QAKhEAAgICAgECBQQDAAAAAAAAAAECEQMhEjFBIlEEE2FxkTKBofBCsfH/2gAMAwEAAhEDEQA/ANdS2KQ6+mmsu0l1Vya8VIaXQETQ927Wl40DdeuiEbIFrt2sUzVTmi9Naq36UY1s2aLTTVpp7dG20qEpmAv8JVhpaYhRVgtLzML00tE29PRKrUZq3IxRUitVah2uVXxKRsIYHq4aghcq4u0DBc1RjWQuVVmooxY1JFDu1D3L9USsIf4grzxRSs6mvP8AEUeBhuL9XF+kw1FaC/SvGaxk1+sLl6g2vVm12ioGCWu154lCeJXniUeJqDPEr3xKC8Sp4lDiGg3xasLtAB6ur1qDQb4tVN6hwa8NagUbeNXtC1K1BGeruYpTcajrlyRQptTSpDSAbrUI60dftGsUtV0R0SZSxZpnYsV5p7NMLVqp5JGPLdqtQtXC1YLUDFAKsKttqwFEBRqwuGiWWsWSiFApq22tltVfw6DMDRXoNbFKoUrUAivVt1Z7TzUmjTMevQd5aKJPMcY95+lb6fRgkM5O2eAIkcHzcAj0/wBp6I4ZrbHUWxGtl2MIpY+wmmNnoV38+MAxImDMd/aut0dhFXyqogbZAALcyxgwwMDn0+ooTUdQVjtt2vFIwSCfDHsCOc5gcRTRyRb4x2x1GN+4usfDLNIBHtnn/eqX/h11XcASPbt9RNHWnur+THcCRjv7UVZ6yplSNpGCpHtE7Tz3qrk14Hkorwc8/TGRirJJifmIgfxCORXh0MKWZfKBJINddc1a4YwYmJnG4EER9+3p96MsaC21mciZCgwGBJ+XtOTimjKLXQtLwcKOnyu4ABeZIZTETzkVqnQGMQCJGMj0J5IiIEzNfQLXSyunS28OwRQ3GTAn/uhtFpfwxIEAlVxwFYqAY+lM+L8Go+d6npN23O5TjnBHHMTz9qCFfRfinRMbdplExfti4YnyMQpJ9u5PtXLanp4JuqokoJHcgABgCZz5SR/6zUJY0+guGrQmFaLWdXVq52IarVjVAahalsBDUqs17WMSyZo61apXp7kU1094U7QWD6izQm0A0Tq9Rml9y5mimK0M7BFGI1KbN6t11FI9gGYNWml41VWTUSQBknAFLQKDq9oM6hQdrXLan0LrP6Ak1p4yYHipn03f6U6hJ+DUEyKkUu1muW2dpl2/hSD9t3H6TVRrX/8A57fSSJ+80ywyZhotucAT9KoxAwSB9SB/Wld3Un87svOeAfYlcV5b0huGVcAczmDH9KosC8sZRsaCDmRHP29a8W6AZABHuOe0R2PoQarZ0YXI59+f0HH+k0dp9JkepyP6Z/0oxxpMeMEgXUMwWTG4gKJ4k4Egc4Boa3ZkqMkk4ECZGOAZ+8f0o3qwyCSSMQBMyAxBgTgGP1+prK0YEKqmWtmQO+4eURBIJgRPcjNdOkNRddG2GIORuBJA8uN2W9N2OZB/W/UHa3a2ky3BAltjCQflEL5rbxPM9swvFptyZYvtDLbbzK8LuVfDHn2MEMmdg3CYgAk68pbU7PmVbaMXtql2dt4bi278RgWiYMyOTyk3Y1V0C3dPqWQotw7d0MJW2Y5IkfKu2W9h2obqNm8l5LT3blu3tUolphbtxBjayzuyIk8ZoJb5uEO7MuZEAypnnjzCY9SIIPE0aD4u3csyxMplCWMSABNuYJKkHiaXj/aMu9iTSdR1PmuC7ftEOFVS7EMDO7D5x5ef4q6Im+ym5euIyooPnUrc83yibe2Scc9iPWq6fR2gwYCSMwCHyszgeVY9WYD2PFe6i5uXeE3urHaklkQnG5j+e4ZOeYmBW3dhdUF6VpG9lEkrHmYKViZ5k4KiJA84pzpNfs8C3fT8IkXNysfLLE2hdQiVlto7+/NLfhT/APJkHaWtncyzAXdkE5MKIiT6cSBDjUXbTK9pdrhs3LhPziRKrGVXsGPpieaK72KkNB1ALde2zsFKh7SkEsYxcjE7QSuDkSe0Rlo+oEKdqqFa6QoJO4ZhiR/5AmO00OmluG6zncuYUySwTZhBMQC2eZMegqXNOtoIzqSN4UlYMbpCll75bJyZ9qwzoZprbZXafOPMCcANzIU/mMzj296UaxbKrcFm35ogniZMEjABAH9RV9frEDBLTkuhhgMiIlld+Exn14xQWoZCG8XBgxGF2kZA7sR3kweYHY3vQj0jj76QxFVFaaq6WYsRBMY7R2gdhWJNcWT9TEsturwvWZNeE0gDTdUrLdUrGFtvW5o63r/euazWttzXS4msdtqZNY+LmhbZq6NU6BYSl41oL9Cqwpj/APDX9qvswwDKdyZB4xuoNexjL/E1m2r7Ubp7VzTtuuaVbgIiLquV+oKkQf1rax1ayMLZNqTkp4bSP/ZN2PrWil/k6Noy02lvsJFpo+kf1rS5pLvBWPYkT+lM+n6hD8jm4edu9lPv5YBPbgGmA1Z/j7RGGI9iCJJroWGL6ZqOZGk1FtpCgH2ZM/aaudYwzdtH6xg/WKfXLjH57atHJHPtJXj9KGL2CYCXR7Ag1SOOvIUimh1NpxsADMxGPT6f7+lONPpktquxQvMmSPYnbMT3rLT27S5ROSfnCluwE+/0osKXj0Hp/ocev6ipznuiyie6exJntP7/AG+3/ONNQkDPr5vb9/Si7p8McRgkTETigbtwHLDE8jIOOCvaW+/9xypBSK6ix+LZGPNIJAEiFJCg5H5Yn+b70E9hXuMrMCm7IUtvZZUbUWPPkAwSY3cAiibqTfIUjaF8hA/NkyJOBxjPB4Emh06pp7Yg3DLEuVyV8SQWJEmGIUcepwYikx5vBNN2Z6zTm3b8RSQyuGtlSoUO5Yb7gDHduQruIA4OJE1z964xbxD7HaN8bQ6tudsMFaBBXIiczTd+oC7wZQErJYLsQsSDEgZJQ8QAnEEijrGjVSjkr8sgNOxlWz4nhNbLSxbxVgzHl9cG/wByyQhsXVIJuWbxi4jLbQoVVGgFQCPnJDRuA5ke7Do2isXNgJdHKlmLWwxW5uHhqImQRu83qBEcB5b0abNObcFbjG1dtuwUqbklltlgTadXAwMwI96wGnR7du4wcEsLbMq/iLcDkXF8Iljd7k7FA5PEimTM1YDcQKu4WGZxPkYIZKkgnce5IEx6jvROj0QF8XXICbJCKwcsx8ypBJUYViJMYMjE0Cz6e2677molyygLZbx0Nn8NWVmbcLrQoJUbYlYBpp0DU3LS3QyW0YnYr3GBvi2J2I6IDtgQYwO9Z9CuhppulBwXZFsW3ABRSPxFBJU3CMPO5vrIz6+2Oq2UuXLITbtg7phCsehPbMzNI+jqNhtC7dIVypIUAiBEAtMLBECKb9JAYbgi7wSjM3maQY5bgHmB60jbFtImoFy5ct3bQMLuBklLTKwxnueIIB70RpwXuMl1wYEqgBVGUjvOWIOCJiIwJoXS6rwd1ppcSxQqJCryQxHygGQD9K30yNdtDUBragqxSfxAZOCSCPQYzz9ayQG2Z6nR7roKFQdpXbACELn9VmRH9653q+vFwW7YWHGWBHBUwQpMfatuq9dL2bSeGiG1AMXD5Csr5Ggc5+zfaglteFY3kea9uVM7otqx3lgwlXJKx7TxTOoq2Te9ISb/APhz9BXs1e9ajIrCa4qt2AsTWbNUZqyZqKiay+6pWe6vKPEAjNWtV49S2aoFhO7FTfiqUy6dpNMwBvao2zJ8i2Wcx6l5Cj96CRgrQ9duqi2mC3LS8IyjH0ceb9yPanGjbTXRCfhOYIBO0bvRWHlb/wBgKy0/QtIxGzUzPaU3f/WiNT8MbZ2XJjMOpXH1BP8Aat611tG2EXLt9PKXLBfmG1FuA5mCymT+lB623auDxFuDcDDrcFsOfrAWfrVW1V2zCXlLIMKwIYqO21wYI/lJ+kUTf2uFeefkvJKnBz9GHdT/AHqsal1+GawEaKyR8iEg5KXCG+hQkfsDW9izMxc3RHluf5gEflud/uCPcU10963d2W9VtMGEvKFG/wDlcH5W/Y9vSg+qdEa35rQJtz3yB/de3tmnUUtrQVG+jC2x4ttkdiQrcxB7N+9NunO7L+JsxlTt82MfMBgf3pHZ0Ds0OIC5iRnjuDP3H0phpbp3BVzgx6fX2EffPqKWeTVIrGIzNuW2gZjgRkdpzHfimGlAXE8cxxH/AHWWlsEZxuInJBEiePQ4bj0HpWFzUbpCQFEmTwewO6ZWSx5H9KgiqRe5dLkqcekgieMekyzd8xRmn0/hiXjIPbiO5kn0A+wH1w0enCk3FGJDD5QAJkYn3wZ//ZmAcbay+zO25Z3TEYyw/h9fr+9c/wATN8eK8kssvCEes6l4aYDBywAX8x8vIJGVkT6dvauOXT3GJEb9rngGdviEsRGDyc/910eqRn1W0+bZby0d5hfqIx/el/T9C3+OZEutZDNG9SRtPhgkAcHdxn1q2GUY39rBjdypDz4i6OiJbu29vktoyFQJf0uH1wF/5NYdM1BSELiA4TyLuI2NbIh5gkOlkEZ/zJFX6vqFRPD8RXADqfKAxMwdsDEHOD9qG1d+LhCKPDMG6qyqygsSUblF3FVIxMOP4Z2KTbr8HZm/xfnyOHg+Mr+GjXbli4wey8C+ApZDdBhVGxSMkksY5FAavqVxDcFrwR4rEPcs2xaZVErtGSyl2wPzQCZHyiW9NfvTve4lu07uANxbbPmO5SSASWnaMzEgc9Nb6Va0rI1xFwpHifOyOxAAYAYLcAgwoBHc11og3uhR0bp27wryspvLbPmdTbY2llIRioKgljmDE9sCjNHpNOvy5N5i0FpYXVRVNkHO54UnH8BqazqJEWbyXS9u7bRHsqAAD8m0hsGAN35fsaG09u7dW5dUahjb1G4A+ChkKhcJEByysRJ/i5BFHRNoLS54Za4LRCYF8GAUvEWwqicFYOTkcHArTSadrl1tzqPAKh3UeS47JkEYwNwMGfy8VXU6vaV1I0t1rVxADalC+9ivhs1pmgtEjkmSMYBoJ0FlrrHRNN24gAiybYJhFMBo3EnJj09K1AuugnpXUmS1dH4Jm9cIuKSN4GJK5gggr835aRakm3aS2fIZZyiPcEEsziUbCgn8v2rXWbNOptPpkGoZvF3AIQWDDYUYZUKFXJAODANe/DvT31rtqLrE2wctn8Vh+VY4tDntOPlyQRHbL9D6Bc1TC46ApMqGO0XGAjcSBPhz7Z9qX9Z6ol6+xW0bRACshjDr5XEjkSI+1dp8WNqNJZtaqwYG4LcQqpUAiVn83KgfNicV8t6xq/E1F28F2C47PtmY3GSJ+pqU/Vpgm+KoZtQl+13rDTazsaODgiubi4k7FrGsmNGaix3pexqsdhLbqleVKNBFVwVEq4suwLKjEDkhSQPqRgUX0u1p3U77jq84gLsIx+bs3POOKZLQ9GFqJEiRIkTEicie31p9odN0+7Mvesv6Mysp+jbf6kU5sdMYqfDNlgBO17aKSD6NaABx3yKG/wDhrcnxrJtSQA4I8ME8ecRtn+YRMZo8RWD3OglX2bsHKkjBHbimGm0msRZt/jIPyqdxEdtvzD7TVbFi7p5X/OtDm2f81B/En8Q5+U/Yc0dp76qysHJtuoKuo4j3GQRnGRjgc0vFX7DKmZp1QXlIJKsMOjAY7GR3Hb271VNDtDNbUAEfiWifI5H5lPNt+YIBHYiiOsOzRdvANGLd9CBdU9g5GHGeGHB9KD6d1dmYyhdjAlQY9io9ccE/rV4rW/ybgRNIl4E2n7xctOALikDIZPX3GDR+n0r2VI3M84yTCkTgep/8v1o3TIqub2wbnUAkCSATx7r/AKVbXISuD3kQfrHPH17/AFkVHJmt0isVQpSTgCe/rnufWftOR9acaCwlsBpIJjcwG7mSCR34P/2nvQzItr5wCwHGNoGRz6gBvTgVTUa0kgMwmAvm2kELiIzIHn/3qdWUNb2pJWAVIkgkeogsfcbFkj+Yc1a/KAAghpBO2RBg7UEGSJY4xG0duPOm9NaWJCzIG0mVB8u5ojIB2eX0B+tZX7x3+GWhBL7lIjdMFlOSYB/Xy/Wc5qtCOXsPNzeEiEiFkiQTJ5BLTIjP6UBb1W4scQIgkQVx+YH68do7wYW39WLrqFYwBkz5ZJEwAYMFcY/1rTqV4WrDSCCRMYzPDYzJmPs3pXNkTbSl34EyKlsVaBybt5mBYDbwB/MBCiT9IB+1XTTAsXUksLk9wQQoXkjntB9RiYFW6dprpuXomdttWQRBw3lIAk4PEjn61stgglLSguxBgAcEEiIEqMQDg+Ze8V1YsdO37GxR4vkVfSHzXHEkEuQxWSTE7QDAXIJPoO3NTo+jZ7z3HALNLMrbk1DzkBbe0kDbtzjb5o5LErXX7SruvH8Jm2g7ov2XYztuIhBuMOyocAznBp10K09y0ytpL10bibTXNmntlSsbmQHcGndnaeRXRCCfSLSnewPWdXW0Nq3NvhtL2r7rbN1WHBEM+0TA4iBMgGaXulakOTC7L/zEaq4basEZt4XaAFgRI9Rj06W1rbluyE1GieVUKxt+HdR4GSIIbMd1GTSro+g6fd0FwqAEuB1KM5Y2N+BbCmfCf2Hc4mq8SVibp/w/qUKvf0jXEUvG3Us924WHlaLhUBIMZIJgYjlx8M6PTXG1G1Llhwyrc0+9reyF8tzZbbb5wYkEghB70T0n4jWzp7NrXFrV9baqxuAw5URuDjEmOMH2ovQ9JS8W1rbg15ECFXdCLQlkkqRLHeT9wO1NQrEx+HGS9bOlv3FNol2W673bQQqVC7GOMnEERB9KXdX6uyC8mo2m4pXwRbLKgxu8V2JEFTGCeY5JwN1Dql7Q6jUWbV3xLbhGL3mLujbTKqZG4AbTH8/1pV0rpdzWXDmEkG47QSZON3E5JgHAk8QDW+4v0Rr0bp9zW3CzOTbMeLdbm73FtMcGB5c/fivpC9MJ07iyQm22QnlDqYUlV2svEmZHc1r0Xog2taSUS0Cm7htxgtOBJJgmdwPf0rmvh346azqH0msKm2Lt1Bd2hSDvYEuoxtPqAI+nE5SsfURY3xodRo7+l1UbmUNacCAWVgwVgODjB49Y78RdE1pejcwBkbjBHBE4NVqDZF7BuK2tXiKjrWQprT0xaoaW74YQaF1Wn7isUNF2bu7BqdcehkBVKKbS5qU3NFNBOm0b2yTotW6ocsHkGRjzW4loIgsFMUdZuIwFrW6dNz5S+DIYz+W6DP8A6kx7Dil12y9pgL4lWPkvZGTgC76H+bke+YY2QfMl5AwGIHy4P51Hr/EP9zV6C4toresPonDAm7Zk7kmCPWRwD78GMximydSACtbbdabgGIdc7gQcKywZHBg+sjKxbAGNwWZQsZde2xp5HAB+x7TgmhW0AFzbZuSG8jHB2+qt6diD64yEURjqPBMbW2clNmCs87f5Z/LxS/WaprRJkEtk7RCvj5h6N394rO6ybyGDQAZbgKw4O4+oyRzgmtLdvarCdxUg5h0+0cAEifY1m0uysYFdDebcLisbbAQQQAGAnBVh5s+2M0y09pnadu1YO4gQvM5gATn9x60PdMCGGOx+aQDPIGcgCT3H6UHUWK7AFAjgTOO+Tzxz6dqjklLjoaWhozgQBmO/JMep9f8AbiiHveGskAkgxztJwc+0Z+jH0NKNHcJOSf8Ar/ofpTtlUpDqGHJWcEj5Q3dlzGJ8twSK4nLwyalbEtsG4QMyp3mCzDJJg4wx2sueZEc0yTSIuxAFa5Bm4CVwSfrA7EjJFzNFI0hVQbSTmYABIiAVnDjaZmJg5zCnrXVDLadBjzQycNGUWQPLjdbMe1XjklN1FD8nLSK3NcQ1xP8AMYhlJEbQQWBLdmzv54gjhiAk0Ntma5yc/maYbmZ/UzH5SZMGi7jKlkhAedqxwfKhUkwIYiDMZ89edG0ZtKXuGVAkgmMgBpnmcrn+cdpqkqhFsd1FBSIu+2hLMWYArMBAMQw7n19xHqa3+IGR71q0VndcQH1iQTkc4UZHYT+Y1tp9OQQ5jB9MwAV5wR6duO1KdQrtqxd48M7onMwQQO0/MfsYxXJji8suSfVr9yMrlscaTTBbrbhl2ngxIwJme08z96J1reYrcuLbUBQ9y4UNpdxAXyk/iGeRML5D7AkHxUDgCMFTJn+YCYIAx3+/lYkeze3XAu9PFP4YLrO5HARpBB8oNxWxHKz2r0HiTSvwWcbVBnwd8MqznX6jbcc+Wx5AttbS4R1T1YeaTnzV2jXAKTfBfVN+jRIPlm0Se5tEpvU/wttkH3orV6gD3NdMJKqIyiE3NQBXzv4gCaTqel1gAFu9dFu6oAMuVYJcj1Bbn2rrjfnmIrh//wDQ9TnTgeZlvJcABHFvzHn6R96ZtCK7O++IdHavWLiXVBBVsmMY59iK+d9P+NrljQ29MLZ8VBt3tG3afMu0AzIVgIMfL9q9+I/jVtRNq0NifnJIJIGWU7ZAgcwT/Y8omla4G1DsVSZ3MC3PA92Igx6TnFLfkO+hp0Ho13W3iWJ53Ox+UTHmY4G4/bgdhX0zoqWVutolATYisUMhzvkED1GBLDBmMVzfROpadNBbuW7jIBfs+OwDbgA4ZrZgeYkKTGRn71zNr4vuDqQ6iwJG75AeLUbQg7SBB9yPepSlY1qJ0nwr8S/4XqF/Rs5/w737ttdxkI4cgGfQkQfcg+tcX1y8G1N9hwb10j6eI0Ut1F8u7XG5dmc/ViSf3NeoaVk27N1rSskNaipMxV6zK1uVrNhWTNRRa1QxmsgK0WiFINS/ipQsVKTiNR1djSmES6+4ldomSLo727o/jHE/mgHmYF0IE+FwQPKSfmWICkn0Aj1x60x1TeNZVtu1lMli0Y9RP5gwOPSgb4O8s/zYAIjaTkMJ4mYMx3q0pLorRfp2n8RjahmJnacxgwWPsJzH7U602gPhqN24ZIBnywdu8x8wDAjjhgaE+D78NdsHzYDrxyDtYzzlWH17U7W4Tt8RQCVG4Od8F1t7uYG3AUrk5mufJmcZcTKgPTgEkqihZ2qQFZSqMCxuieVbcsnkGaM8NVUHaFRQYEABBJwZWR5gVjuCtA6jUpZ3KNpuCCVMA7mIXzevoYXKsDilSXbmpuR5onhm3C3xuO3ALeQwDkweak4yy7Wo+5m219CaspdcsN3hiBuwGIOeRyzYyf4aDvXQT5QAPb/n/M0b1Aqi7LZ8o4PqD/UE5HcGRS1RS8r0uiEpWE6RiDj9uT9PenlhoA3GAT2xJ2khhiMoGH1UUn0a5xz2Poex/X+tNm0avG4kR8s4gMTBHoUfHpDUk0m6fRo1ewTV9SDCFDFZgmCsh22sBHGdjj70rsoCm8nbhW2kNEsJEYxLo0R3NPr/AEyyADuYCBIJwvDCB6hlYc8Y96F6lftqB4VpQfymMDM/p+I4j3FUXxGOPpgrL/MjHSFR0xu39ykbU7HjLNGSPKfNA9/SibPUd910YDaoKqf4s8CIjP7fpRGj0sg8AkgtPbBJj0oy50lCANmFzPBkZwe0GovMpup/t9BOdvZrp3kHdCv2BHvJMcn/AJ6Ugu/EGltObTAF2bzYltxMzzg8Vp1E3PHt27JUXIYljwFCEEn2yP8AWuct/BzXfEvG8RudtpKyHgwW5lQTx7duK7cHw8IbX3KOFLR9L0SFrRKiTnakbUJjcgkg7ZkevzACdxobV9Me5et3IjZuIWJ3ORAE4lfxMjuW7Bjt4PSWuo2m2WrjgLt2yviTmYDFZnGc4kjgmirHiSv+P1V5JKqqIigR5ebpGMqMAYz6muxdGVodL1RtDdF9HLado8SyS3kwJe2X5EG2doz+Jxiug1vX7dwLdt3FKkAjIiPtXzfqeo0Py27RuRgMSzQMfKCfNIAgn+1IL91NzC0nhLE7ZJOF5JPrkx2mKCQkmfSOt/Gdqyu1W3vwAv8Af0FfPr+uvam4Wc5OCPyqpOFHrP70FZ08jee4Mc+n7f8Af2674e6R4aeMcMV8oImJ3efbB9IlgBAmYNN0BKzPTdGbaBdm2pI3M07ipO6NsSJEV13xF0PxNGbdlEBtsHI3CduRkmdpzMTkEdzAH+IOogBgjK4CqoJbO4/z9lVcQPT3orXKy6OxeuEtZUpcvquWulY8NJP5Nxkz6zkgVPlbKyglE+a2NRcQNYJIXeC6dt6blBI9QGYV7qF71XXagvfe60S7M5jiWYkge2aJiVpHpnNQCGrVGrBxBq6GqMAYhom1QVs0bp658mgo1ZaxcUS1YsKSLCDGrrUYVEqg1GoqVqLFShyQTs9Tp7bGX8q7Dc3ZliQMSQFyHIxn1pWyMYXbuOCcZB8o5mAJHJ9ad6m+ikqwBKgGIaD5iAIP8pHastJeLBQgxtPiCdvmKGBjPK81yfPklyrQXJmvTNJ4aliScbiqQFUgEgEKRvabZEzHtRPU7lxNyqoMKxBa6Vj5kJ8ogyHQxM1a1dQMzKQFBG9eBtEXCSP/ABuNilfxHet+W3BkFnuFAZQIFWQp7EpbaDU8b+ZkXLyCO2JgWCi4YHlZzcmXYt/EexKsPrtplousW104sQQxJLsQASTJaCvdWUbSfWlyMSPGQDbceESJO0AwVA4bLLn1FUvINxIUgcAHkds+55r0MzTjRTIvSW1N/ccf89THas1asoqxxXHE5TYapl+Uf0+9ZnqVzPiXmEiCAqkwfmG5sZB7UKHkxRy9Ks3ZZ1UgiVkGSAfy7uDEfqfSrLj1IpCjez1rSAZvFmPO6YHmkz+VeTU1PW7Lt+FuubYygBUH1k45PPsKC1HQbMA+CCBIkxAj278cd6E/+MCkBDJImLZZFziDtiaMcGJ+pWVWNdjZtTqSItJbnMjeATzg9+Mfr60LqdZ1EDKL9dwPfnH1oQ/DLsJ3XFIySWJ54Edvr7VvpLGFtXHuWzO1bgbchPYPukD6iK0cCTtNP9jLG/Bl0BLp1F7xni49rYsRIkgnbHsFrubWlChVAhFAChe49B3jvHeexOeNe6FuW0uhzdQyCq/5kfKBA/rXSp1byC4QqrLA7rh3ECAQQRntXUPVKg8uE80iSDnHC85IaAO+IHJbkjhfivrxvbrEjYrbmbHmAmJyY/NP5ZVo99eq/FAuILVjj5S0fkHG0DniRzkEjzUr6fovEbaBEgkt2Ues+mIn2BxgisVS2SlK9IB0ekZvkBMHsJz6n345Pcc8np9L0ixbtbysu0BieWP8AGRIn5e+Oe7Xo3TljYs7AZYRkxMiDwTPoRyJYyw31ZBIlYgnBA+bBCqMmQI4BImYg0jdjKNCWx05PwrHhr5nAkEBiFDXGI2iRKrGRyBjFNNd1a2jta3AbQnh7VUqzBlPEwgBE4AiSKT6C74+vAO4rbW4SJjt5iNxgECCASR5e8ADotV0rT3dXbOqV1UqzeIhVbV2Bu3MYDK8bp+XgQBSNvkOqoSdQ0F86cakWwyMSSbYPlCiCWUCFBAPGP2qavrCDpNuwGl3uuAJyLavu3MO0nHvn0pgvXDb0Wo0qgxdELnCqcOPeQAP1rggKVTtEpZLK3lDQe9a2TGKkVmzUf1CMpqVrJTRBzQ7iDTRfgFG1tqYac0rQ0y0xqeVGCjWDGtWNCu9SigosTVaruqy1RDBK3zFeVQD2qU3CJjur4YbmcK7FTvbuoKAhf8A7Ka204VGCqTAiDGfmMT7Q4yaFYnC7SCDLCZkSSoP2Yj61RtWqrcG4hQAVKwTlQAfXtb+5NeLNyyelfx+P+fQV2w9LhtguNrJcK7swQuMxGYts4PsgpD1Vm8drTbtjW1Bi4SMLClniQJn9RRnXNfbKpa0xFx8gBVJJBVpG7gYcc+ornnsXbkjd4RUKptsS7u3HlHER/UV0/BQV85d/wA96f8ABbGqDNLZREWXhlZpzBB9QPQEKfrNS/qvEYsBA/4f70OnT7YIe54jMFPibyOfZVGM+taKhgMRAPH0/wBK7MrFzPVHtYai7Wl1opbqbtShG2cxS1e8/wDtNONDdVjckkgLKPtJCmQZIHv+4PrSWwP9D9PrTG1eKM1q08I6kHccTHE+4ro4oriRtqdYdpLmWIVlI27Sp9QP9PbkU9+FxbNpXfBJaSeDmMDMEiOVEx35rkNIviuBIEAkyYn1EcT/AFrrdB1M3NqlUVEDQpfalxO9plXCzGDxgYpp41JUwznekObmhDeIp3hVETtde245YTI9D27nsk1ehhQsFluqA4g8z5WE/LXSaTqFq5aQAbpXf4agu4TcNylicukyCcwKRfHmsuWXS1bhd0ncuD2AUifRgfuKVY2penobHKhLa1pto4cgvaUNaMCROAs95EfpSLU9BugWyzMxdd21icFiJAB75E45NPtVpBbFtSBddNztkRDwp4Ek9v37Vl1CFKeYttD7ljcVgwI/ikEEjBiQDkA2T9ikqYjbRlACVOcg4gjEndMDtJn+GTIUV03SNF4YBYbGYcsCpjA8oaApEZA3sMcAKVC0D7nBHJxMqSSBu3bhJYATmA0MC0gkjprawAxUyRJCiFdQAxAVTBGY+a4QOHImDKWhYxVlGAFnapSPmgkgQYCqzYEEGM7QZwDwVPX9SEDMBkAq8bQSciG2p83GGYccTNHa25K79yoHLbZViQDsBVXViSwlgUtkHEMCPLXO/Eu+AplPMDBDBQVAKxhVAMgYUDiI4GXQzN/gxFRdRqHgNbVWAMrxLb7bwYuDAjk8DbzXnWfiHxrjKm4WQ5a2jbQQSFDMdvc7ZPPJ+tc/e1BI2DCTuCzjcRkj9/1rIGubJK2TcvB0K3wVP0NJgK8tXyKuooQFPIrO7box7QEZ+1XuWsVS+LowutCq30okpBrx1p78hAlFMNMaH8Ot7Qpcm0AJuGgbzZo9higNQtSiY8V61ttnmPehAa0U1QJ0lnqNhQFG8x3gf3NSufD1KHyYms7bUXzbeUDMLhna3JaDHvHt7VlpNGW3Lf8AKs58MTkxjiBAZD9FPpW2k0+5kIczyxPYEYA9Gx+qGt26/a09sMrhpcjZxdaeyn6mf/FvavIlKUtQX+/719DWF6TS2wgDRb27oJPCncNkDkiSDH8C+1LOo39xJYALbKhAqkAwcw/biPvQ+nvX7oe6yqEJLLuLHYPdjjED3wKXXtQWHhByUHb/AJ9at8Nj4Tcn/fsMnXZe8UuFrwUoC3lScQO/vmitVeLwxAE4AHAAwBQxuEwCZ/SvWNdU52TyOwPVXKWF5NF61qXmq4loixhpFkx696LZDcZUiQCAduJE5J7fel2lf9orqvhSyCzPPGILQDIJgjvMftVF2Vj0X1+hSyWt27aqAsEOQ7uGzIIwIil+nWJjANbathGIyd4jle22hhcqOSbvQp1mk66LaM0KxlCFgCWYbWg9sCuO073DcOqueb+ENmJQ7QOfKNp7dq0Z594q1vpyMV38AndAxCtIAI9QxFFZ6XqGi0hlo0X/AA7tcTZMsHEgsScBgMkBiOO1Jur2xbNotcVyEYvtBAVlYY5ndgn6jtRms6ntlBJ8gIiPKFM7iQOBk+tcs6+LcAAYAkCSRkGASXYgSckkmJPpVsXqVjJnRfCtku/iMAwA4OACSGJCAGeQAQF5IDYILY3LbZeCu7cEgkdiZUZYkAsR5jliQYka2LRVGt+WU3wEAlpGBbt5AJAYkruAYZ5NLelBd2pN6LbMLwUt5QbhIZQwhYHkLQSBAECeWW9lUxwrSWuMVbdbZ/C8u5lCJ/mbZ/Dg5BYrPO3McX1lfMAQAMxCgGJ2wygmDAmWzg11PUOokoEYrcgNvIu7oBUKwCWQBIJkEYIMNk1zOuUCNoITaAJULJxLBZ3RwQTOCBTPRpMSvyagNa3bdYmuRokWBphpzyfaltPNFpQyAnuMVoy4uwgqoee1atcxFNP8OpQJS/WdNflc1k7ZgB3zXm6o+mcGCpqAVZGPJr1LlVKVntNH7mYet2srgmhwTVg9D5XsJZ4UqpWtA9UucUKaY1lN1Ssd1SqAO2+IOulSbdsBTJUsO8cx6dz96D6VoWtq19rQun5t2+Cq+aVCkeo59qlSvN4qCjFdNorBWy/U21bW1N25Ft3JVBGO8GsrFqFBjnvUqVSVKOkLkVMuK8Y1KlTIizWGgDXtSuzF0IzW04A4k/7iuv6Di1tRfNcA3MxEKVbdKj6VKlPJ0h0/SD665uJIxJ3fr2/ahCKlSuNNvsx5V/FMQCe/7x/pXlSi1ZgFNKblwKO5z6Hk59q6jpvTFst4YJW6wbzCGB3DG1TEYB79yO9SpV1J9FYrR5pB4isEZfIFe4HQswSSXKCdoPzzyWJ7CsyQvk8NPF8Zi0yylF86gzkr5FBmTjEyQZUroXYU9lbuuAu3Ha4PDLEFJdTtLPuUslqSDBP/AKrSzX20FmUZmUsCPIqCQBkyS3yMMcST9K8qVmgraE4zQl5M1KlSaFMorpemLFpPcTXtSoZFoKDhbBEmgtVca2N8yvevalRT2GjTSaxXFV1OgV8jB9R/cVKldEZMR6FOr0rJ83HYig2NSpXQtoxA1Zu1SpQi9is8DV5cfFSpVGAHmvKlSlMf/9k=" alt="Iguana Care Center" class="vet-img">
         <h3>Iguana Care Center 🦎</h3>
         <p>📍 333 Reptile Road, Iguana City</p>
         <p>⭐ 4.8 / 5 <span class="paws">🦎🦎🦎🦎🦎</span> (50 reviews)</p>
         <button class="book-btn" onclick="openBookingModal('Iguana Care Center 🦎')">Book Appointment 🗓️</button>
        </div>







    </div>
</div>

<!-- Booking Modal -->
<div id="bookingModal" class="modal">
    <div class="modal-content">
        <span class="close-btn" onclick="closeBookingModal()">&times;</span>
        <div id="modal-body">
            <h2 id="vetName">Book Appointment</h2>
            <div id="form-container">
                <label for="email">Email:</label>
                <input type="email" id="email" placeholder="Enter your email" required>
                <label for="phone">Phone Number:</label>
                <input type="text" id="phone" placeholder="Enter your phone number" required>
                <button class="book-btn" onclick="confirmBooking()">Confirm Appointment ✅</button>
            </div>
            <div id="thankyou-message" style="display:none;">
                <h3>🎉 Thank you for booking!</h3>
                <p>Please print this receipt and come to our chamber.</p>
                <button class="book-btn" onclick="printReceipt()">🖨️ Print Receipt</button>
            </div>
        </div>
    </div>
</div>

<style>
body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    overflow-x: hidden;
    background: linear-gradient(135deg, #d6f0ff, #fff0d6, #ffd6e8);
    position: relative;
}

/* Optional overlay to soften neon pastel glow */
body::before {
    content:'';
    position:fixed;
    top:0; left:0;
    width:100%; height:100%;
    background-color: rgba(255,255,255,0.25);
    z-index: -1;
}

.vet-container {
    max-width: 1100px;
    margin: auto;
    padding: 20px;
    position: relative;
    z-index: 1;
}

/* Neon heading */
.neon-text {
    text-align: center;
    color: #66ccff;
    text-shadow: 0 0 5px #66ccff, 0 0 10px #66ccff, 0 0 20px #66ccff;
}

p.subtext {
    text-align: center;
    color: #555;
    margin-bottom: 40px;
    font-size: 1.1rem;
}

.vet-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px,1fr));
    gap:25px;
}

.vet-card {
    background: rgba(255,255,255,0.85);
    border-radius:15px;
    box-shadow:0 6px 15px rgba(102,204,255,0.3),0 6px 25px rgba(255,182,193,0.3);
    padding:20px;
    transition: transform 0.3s ease, box-shadow 0.3s ease, background 0.3s ease;
    text-align:center;
    position: relative;
}

.vet-card:hover {
    transform: translateY(-10px);
    box-shadow:0 12px 25px rgba(102,204,255,0.5),0 12px 35px rgba(255,182,193,0.5);
}

.vet-card h3 {
    margin-top:15px;
    color:#66ccff;
    text-shadow:0 0 5px #66ccff,0 0 10px #66ccff;
}

.vet-card p {
    margin:8px 0;
    color:#444;
    font-size:0.95rem;
}

.vet-img {
    width:100%;
    height:180px;
    object-fit:cover;
    border-radius:12px;
}

.book-btn {
    background: linear-gradient(to right,#66ccff,#ffb6c1);
    color:white;
    border:none;
    padding:10px 20px;
    border-radius:12px;
    cursor:pointer;
    margin-top:12px;
    font-size:14px;
    transition: background 0.3s ease, transform 0.2s ease;
    box-shadow:0 0 8px rgba(102,204,255,0.6),0 0 15px rgba(255,182,193,0.4);
}

.book-btn:hover {
    background: linear-gradient(to right,#99ddff,#ffc0d6);
    transform: scale(1.05);
    box-shadow:0 0 15px rgba(102,204,255,0.8),0 0 25px rgba(255,182,193,0.6);
}

.paws {margin-left:5px;}

/* Floating paws */
.floating-paw {
    position: fixed;
    font-size: 2rem;
    animation: float 6s ease-in-out infinite;
    opacity: 0.8;
    z-index:999;
    text-shadow:0 0 8px #66ccff,0 0 15px #ffb6c1;
}

.paw-top-left{top:15%;left:5%;color:#66ccff;animation-delay:0s;}
.paw-top-right{top:15%;right:5%;color:#ffb6c1;animation-delay:1s;}
.paw-bottom-left{bottom:5%;left:5%;color:#99ddff;animation-delay:2s;}
.paw-bottom-right{bottom:5%;right:5%;color:#ffc0d6;animation-delay:3s;}

@keyframes float{
    0%,100%{transform:translateY(0) translateX(0);}
    25%{transform:translateY(-15px) translateX(10px);}
    50%{transform:translateY(-30px) translateX(-10px);}
    75%{transform:translateY(-15px) translateX(10px);}
}

/* Modal same as your original */
.modal{display:none;position:fixed;z-index:1000;left:0;top:0;width:100%;height:100%;overflow:auto;background-color:rgba(0,0,0,0.5);}
.modal-content{background-color:#fff;margin:10% auto;padding:20px;border-radius:12px;width:90%;max-width:400px;text-align:center;position:relative;}
.close-btn{position:absolute;top:10px;right:15px;font-size:28px;font-weight:bold;cursor:pointer;}
#form-container input{width:90%;padding:10px;margin:10px 0;border-radius:8px;border:1px solid #ccc;}
#thankyou-message h3{color:#66ccff;}
</style>

<script>
function openBookingModal(vetName){
    document.getElementById('vetName').innerText=vetName;
    document.getElementById('bookingModal').style.display='block';
    document.getElementById('form-container').style.display='block';
    document.getElementById('thankyou-message').style.display='none';
    document.getElementById('email').value='';
    document.getElementById('phone').value='';
}
function closeBookingModal(){document.getElementById('bookingModal').style.display='none';}
function confirmBooking(){
    const email=document.getElementById('email').value;
    const phone=document.getElementById('phone').value;
    if(email && phone){
        document.getElementById('form-container').style.display='none';
        document.getElementById('thankyou-message').style.display='block';
    }else{alert('Please enter your email and phone number.');}
}
function printReceipt(){
    const vetName=document.getElementById('vetName').innerText;
    const email=document.getElementById('email').value||'Not provided';
    const phone=document.getElementById('phone').value||'Not provided';
    const printContent=`<h2>Appointment Receipt</h2><p><strong>Clinic:</strong> ${vetName}</p><p><strong>Email:</strong> ${email}</p><p><strong>Phone:</strong> ${phone}</p><p>🎉 Please print this receipt and come to our chamber.</p>`;
    const originalContent=document.body.innerHTML;
    document.body.innerHTML=printContent;
    window.print();
    document.body.innerHTML=originalContent;
    location.reload();
}
window.onclick=function(event){const modal=document.getElementById('bookingModal');if(event.target==modal){modal.style.display="none";}}
</script>

@endsection





