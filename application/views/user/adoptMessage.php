<html>
    <head>
        <title>Pet Adoption Application Form</title>
    </head>
    <style>
    </style>
    <body>
        <div id="container" >
            <center>
                <h1 style="font-size:80px; color:green;">PetEx</h1>
                <h6>The Philippine Animal Rehabilitation Center</h6>
                <h2 style = "font-weight: bold; font-family:Roboto;">ADOPTION APPLICATION</h2>
                <span style = "font-size: 11px;">PAWS Animal Rehabilitation Center (PARC), Aurora Boulevard,
                    <br>Katipunan Valley, Loyola Heights, Quezon City</span>
            </center>
            <hr>
            <div id="body" >
                <center>
                    <p style = "font-weight: bold;">You will still need to have an interview with an adoption counsellor, prior to approval of your application.<br>
                        Filling out this form will save time at the shelter, but not substitute for an in-person interview.<br><Br></p>
                </center>
                <br>
                <label>Date of Application: <?= $date ?></label><br><br>
                <label>Name: <?= $name ?></label><br><br>
                <label>Age: <?= $userage ?></label><br><br>
                <label>Email: <?= $email ?></label><br><br>
                <label>Address: <?= $address ?></label><br><br>
                <label>Tel Nos. (Home): <?= $numhome ?></label><br><br>
                <label>Tel Nos. (Work): <?= $numwork ?></label><br><br>
                <label>Mobile No.: <?= $nummobile ?></label><br><br>
                <center>
                    <h2>Chosen Adoptee</h2>
                    <br>
                </center>
                <label>Pet Name: <?= $adoptee_name ?></label><br><br>
                <label>Age: <?= $adoptee_age ?></label><br><br>
                <label>Specie: <?= $adoptee_specie ?></label><br><br>
                <label>Sex: <?= $adoptee_sex ?></label><br><br>
                <label>Sterilized?: <?= $adoptee_sterilized ?></label><br><br>
                <label>Admission: <?= $adoptee_admission ?></label><br><br>
                <center>
                    <h2>Personal Reference</h2>
                    <br>
                </center>
                <label>Name: <?= $nameref ?></label><br><br>
                <label>Relationship: <?= $relref ?></label><br><br>
                <label>Tel No.: <?= $numref ?></label><br><br>
                <label>What prompted you to come to PARC?: <?= $prompt ?></label><br><br>
                <label>Are you interested in: <?= $interested ?></label><br><br>
                <label>Size: <?= $size ?></label><br><br>
                <label>Breed/Mix: <?= $breed ?></label><br><br>
                <label>Age: <?= $petage ?></label><br><br>
                <label>Name/description of animal(if animal is available at PARC): <?= $description ?></label><br>
                <center>
                    <h2>Questionnaire</h2>
                    <br>
                </center>
                <label>1.) Why did you decide to adopt an animal from PAWS?: <?= $num1 ?></label><br><br>
                <label>2.) Have you adopted from PAWS/PARC atleast once before?: <?= $num2 ?></label><br><br>
                <label>When is the latest?: <?= $num2ifyes ?></label><br><br>
                <label>What animal?: <?= $num2ifYesSpecie ?></label><br><br>
                <label>3.) What type of building do you live in?: <?= $num3 ?></label><br><br>
                <label>Please Specify: <?= $num3Other ?></label><br><br>
                <label>4.) Do you Rent?: <?= $num4 ?></label><br><br>
                <label>5.) Who do you live with?: <?= $num5 ?></label><br><br>
                <label>How long have you lived in this address?: <?= $yearslived ?></label><br><br>
                <label>Please Specify: <?= $num5specify ?></label><br><br>
                <label>6.) Are you planning to move in the next 6 months?: <?= $num6 ?></label><br><br>
                <label>Where?: <?= $num6explain ?></label><br><br>
                <label>7.) For whom are you adopting animal?: <?= $num7 ?></label><br><br>
                <label>Please Specify: <?= $num7specify ?></label><br><br>
                <label>8.) Will the whole family share in the care in the care of animal?: <?= $num8 ?></label><br><br>
                <label>9.) Is there anyone in your household who has objection(s) to the arrangement?: <?= $num9 ?></label><br><br>
                <label>Explain: <?= $num9explain ?></label><br><br>
                <label>10.) Are there any children that visit your home frequently?: <?= $num10 ?></label><br><br>
                <label>Age Range: <?= $num10age ?></label><br><br>
                <label>11.) Are there any other regular visitors to your home, human or animal, with which your new companion must get along?: <?= $num11 ?></label><br><br>
                <label>Explain: <?= $num11explain ?></label><br><br>
                <label>12.) Are any members of your household allergic to cats/dogs?: <?= $num12 ?></label><br><br>
                <label>Who?: <?= $num12age ?></label><br><br>
                <label>13.) What will happen to this animal if you have to move unexpectedly?: <?= $num13 ?></label><br><br>
                <label>14.) What kind of behavior(s) do you feel unable to accept?: <?= $num14 ?></label><br><br>
                <label>15.) How many hours in an average workday will your companion animal spend without a human?: <?= $num15 ?></label><br><br>
                <label>16.) What will happen to your companion animal, when you go on a vacation or in case of emergency?: <?= $num16 ?></label><br><br>
                <label>17.) Do you have regular veterinarian?: <?= $num17 ?></label><br><br>
                <label>Name: <?= $num17name ?></label><br><br>
                <label>18.) Do you have other companion animal(s) in the past?: <?= $num18 ?></label><br><br>
                <label>What animal?: <?= $num18animal ?></label><br><br>
                <label>19.) What part of your house do you want this animal to stay?: <?= $num19 ?></label><br><br>
                <label>20.) Where will this animal be kept during the Day? Night?: <?= $num20 ?></label><br><br>
                <label>21.) Do you have a fenced yard?: <?= $num21 ?></label><br><br>
                <label>Fence height and type: <?= $num21fence ?></label><br><br>
                <label>22.) If adopting a dog, does fencing completely enclose the yard?: <?= $num22 ?></label><br><br>
                <label>How will you handle he dog's exercise and toilet duties?: <?= $num22how ?></label><br><br>
                <label>23.) If adopting a cat, where will the litterbox be kept?: <?= $num23 ?></label><br><br>
                <label>Please Specify: <?= $num23specify ?></label><br><br>
                <label>24.) As a matter of policy, PARC will neuter all animals prior to releasing
                    for adoption. What is your opinion about spaying and neutering (kapon) of companion animals?: <?= $num24 ?></label><br><br>
                <label>25.) Do you have questions and comments?: <?= $num25 ?></label><br><br>
            </div>
        </div>
    </body>
</html>