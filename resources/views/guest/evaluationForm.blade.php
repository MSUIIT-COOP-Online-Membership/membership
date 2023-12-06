<div class="tabpanel">
    <div>
        <h1 class="tab-title">Evaluation Form</h1> <hr class="mb-3">
            <!-- <div class="home-box instruction-box">
                    <h2>Instruction</h2>
                <p>There are 10 questions, and the passing score is 8. 
                        If you fail, you have the option to watch the seminar video again or try the quiz again.
                        <br><br><br> Good luck!</p>

                <div class="btns-group start-btn">
                     <button id="toReview" class="btn btn-next" type="button">Start</button>
                </div>
            </div> -->

            <div class="home-box instruction-box">
                <div class="ques-num">
                    Question 0 to 10
                </div>
                <div class="ques-text">
                    Choose your desired branches
                </div>
                <div class="row">


                    @forelse($branches as $branch)
                    <div class="col-lg-4">
                        <input type="checkbox" name="branches[]" id="{{ $branch->name }}" value="{{ $branch->id }}">
                        <label for="{{ $branch->name }}"  >
                            {{ $branch->name }}
                        </label>
                    </div>
                    @empty
                    @endforelse

              
                    {{-- <div class="checkbox-container">
                        <input class="form-check-input" type="checkbox" id = "branch1" name="branch_id" value="29" />
                        <label for="branch1"> Bacolod LDN Branch </label> <br>
                    </div>
                    <div class="checkbox-container">
                        <input class="form-check-input" type="checkbox" id = "branch2" name="branch_id" value="14"/>
                        <label for="branch2"> Bulua Branch </label> <br>
                    </div>
                    <div class="checkbox-container">
                        <input class="form-check-input" type="checkbox" id = "branch3" name="branch_id" value="21"/>
                        <label for="branch3"> Buru-un Branch </label> <br>
                    </div>
                    <div class="checkbox-container">
                        <input class="form-check-input" type="checkbox" id = "branch4" name="branch_id" value="26"/>
                        <label for="branch4"> Butuan Branch </label> <br>
                    </div>
                    <div class="checkbox-container">
                        <input class="form-check-input" type="checkbox" id = "branch5" name="branch_id" value="15"/>
                        <label for="branch5"> Carmen Branch </label> <br>
                    </div>
                    <div class="checkbox-container">
                        <input class="form-check-input" type="checkbox" id = "branch6" name="branch_id" value="16"/>
                        <label for="branch6"> Cogon Branch </label> <br>
                    </div>
                    <div class="checkbox-container">
                        <input class="form-check-input" type="checkbox" id = "branch7" name="branch_id" value="27"/>
                        <label for="branch7"> Davao Branch </label> <br>
                    </div>
                    <div class="checkbox-container">
                        <input class="form-check-input" type="checkbox" id = "branch8" name="branch_id" value="28"/>
                        <label for="branch8"> General Santos Branch </label> <br>
                    </div>
                    <div class="checkbox-container">
                        <input class="form-check-input" type="checkbox" id = "branch9" name="branch_id" value="22"/>
                        <label for="branch9"> Kiwalan Branch </label> <br>
                    </div>
                    <div class="checkbox-container">
                        <input class="form-check-input" type="checkbox" id = "branch10" name="branch_id" value="17" />
                        <label for="branch10"> Laguindingan Branch </label> <br>
                    </div>
                    <div class="checkbox-container">
                        <input class="form-check-input" type="checkbox" id = "branch11" name="branch_id" value="18" />
                        <label for="branch11"> Manticao Branch </label> <br>
                    </div>
                    <div class="checkbox-container">
                        <input class="form-check-input" type="checkbox" id = "branch12" name="branch_id" value="30" />
                        <label for="branch12"> Maranding Branch </label> <br>
                    </div>
                    <div class="checkbox-container">
                        <input class="form-check-input" type="checkbox" id = "branch13" name="branch_id" value="31"/>
                        <label for="branch13"> Pagadian Branch </label> <br>
                    </div>
                    <div class="checkbox-container">
                        <input class="form-check-input" type="checkbox" id = "branch14" name="branch_id" value="20"/>
                        <label for="branch14"> Pala-o Branch </label> <br>
                    </div>
                    <div class="checkbox-container">
                        <input class="form-check-input" type="checkbox" id = "branch15" name="branch_id" value="19"/>
                        <label for="branch15"> Puerto Branch </label> <br>
                    </div>
                    <div class="checkbox-container">
                        <input class="form-check-input" type="checkbox" id = "branch16" name="branch_id" value="23"/>
                        <label for="branch16"> Poblacion Branch </label> <br>
                    </div>
                    <div class="checkbox-container">
                        <input class="form-check-input" type="checkbox" id = "branch17" name="branch_id" value="24"/>
                        <label for="branch17"> Suarez-Tominobo Branch </label> <br>
                    </div>
                    <div class="checkbox-container">
                        <input class="form-check-input" type="checkbox" id = "branch18" name="branch_id" value="13" />
                        <label for="branch18"> Tibanga-Main Branch </label> <br>
                    </div>
                    <div class="checkbox-container">
                        <input class="form-check-input" type="checkbox" id = "branch19" name="branch_id" value="25"/>
                        <label for="branch19"> Tubod Iligan Branch </label> <br>
                    </div>
                    <div class="checkbox-container">
                        <input class="form-check-input" type="checkbox" id = "branch20" name="branch_id" value="32" required/>
                        <label for="branch20"> Tubod LDN Branch </label> <br>
                    </div> --}}
                </div>

                {{-- <div class="eval-group">  
                    <label for="referName">Name of referring person  (if none, kindly put NA)</label> <br>
                    <input class="mb-3" type="text" name="referName" placeholder="Your answer" class="form-input" id="referName" required/>                    
                    <span class="field-message">This field is required</span> <br> <br>
                </div> --}}
            </div>

            <div class="home-box instruction-box">
                <div class="ques-num">
                    Question 1 to 10
                </div>
                <div class="ques-text">
                    How well did you understand our online Pre-membership Education Seminar?
                </div>
                <div class="option-container2">
                    <p class="lowHigh"> Lowest </p>
                    <div class="radio-label">
                        <label class ="radio1" for="eval1"> 
                            <input class="form-check-input" type="radio" id = "eval1" name="q_one" value="1" required/>
                                1 
                            <span></span>
                        </label> 
                    </div>
                    <div class="radio-label">
                        <label class ="radio1" for="eval2">
                            <input class="form-check-input" type="radio" id = "eval2" name="q_one" value="2" required/>
                                2 
                            <span></span>
                        </label>
                    </div>
                    <div class="radio-label">
                        <label class ="radio1" for="eval3">
                            <input class="form-check-input" type="radio" id = "eval3" name="q_one" value="3" required/>
                                3
                            <span></span>
                        </label>
                    </div>
                    <div class="radio-label">
                        <label class ="radio1" for="eval4">
                            <input class="form-check-input" type="radio" id = "eval4" name="q_one" value="4" required/>
                                4 
                            <span></span>
                        </label> 
                    </div>
                    <div class="radio-label">
                        <label class ="radio1" for="eval5">
                            <input class="form-check-input" type="radio" id = "eval5" name="q_one" value="5" required/>
                                5
                            <span></span>
                        </label> 
                    </div>
                    <p class="lowHigh"> Highest </p>
                </div>
            </div>

            <div class="home-box instruction-box">
                <div class="ques-num">
                    Question 2 to 10
                </div>
                <div class="ques-text">
                    Who are the owners of MSU-IIT NMPC (IIT Coop)?  
                </div>
                <div class="option-container3">
                <div class="radio-label">
                        <label class ="radio" for="eval6">
                            <input class="form-check-input" type="radio" id = "eval6" name="q_two" value="Board of Directors" required/>
                            Board of Directors 
                            <span></span>
                        </label> <br>
                    </div>
                    <div class="radio-label">
                        <label class ="radio" for="eval7">
                            <input class="form-check-input" type="radio" id = "eval7" name="q_two" value="Management and Staff" required/>
                            Management and Staff
                            <span></span>
                        </label> <br>
                    </div>
                    <div class="radio-label">
                        <label class ="radio" for="eval8">
                            <input class="form-check-input" type="radio" id = "eval8" name="q_two" value="Members" required/>
                            Members 
                            <span></span>
                        </label> <br>
                    </div>
                </div>
            </div>

            <div class="home-box instruction-box">
                <div class="ques-num">
                    Question 3 to 10
                </div>
                <div class="ques-text">
                    What year did the IIT Coop started?
                </div>
                <div class="option-container3">
                    <div class="radio-label">
                        <label class="radio" for="eval9">
                            <input class="form-check-input" type="radio" id="eval9" name="q_three" value="1978" required/>
                            1978
                            <span></span>
                        </label>
                    </div>
                    <div class="radio-label">
                        <label class="radio" for="eval10">
                            <input class="form-check-input" type="radio" id="eval10" name="q_three" value="1987" required/>
                            1987
                            <span></span>
                        </label>
                    </div>
                    <div class="radio-label">
                        <label class="radio" for="eval11">
                            <input class="form-check-input" type="radio" id="eval11" name="q_three" value="1999" required/>
                            1999
                            <span></span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="home-box instruction-box">
                <div class="ques-num">
                    Question 4 to 10
                </div>
                <div class="ques-text">
                    How much is the interest rate of our Savings Deposit?
                </div>
                <div class="option-container3">
                    <div class="radio-label">
                        <label class ="radio" for="eval12">
                            <input class="form-check-input" type="radio" id = "eval12" name="q_four" value="0.75 % per annum" required/>
                            0.75 % per annum
                            <span></span>
                        </label> <br>
                    </div>
                    <div class="radio-label">
                        <label class ="radio" for="eval13">
                            <input class="form-check-input" type="radio" id = "eval13" name="q_four" value=" 1. 25 % per annum " required/>
                            1. 25 % per annum 
                            <span></span>
                        </label> <br>
                    </div>
                    <div class="radio-label">
                        <label class ="radio" for="eval14">
                            <input class="form-check-input" type="radio" id = "eval14" name="q_four" value="1.50 % per annum" required/>
                            1.50 % per annum
                            <span></span>
                        </label> <br>
                    </div>
                    <div class="radio-label">
                        <label class ="radio" for="eval15">
                            <input class="form-check-input" type="radio" id = "eval15" name="q_four" value="1.75 % per annum" required/>
                            1.75 % per annum
                            <span></span>
                        </label> <br>
                    </div>
                </div>
            </div>

            <div class="home-box instruction-box">
                <div class="ques-num">
                    Question 5 to 10
                </div>
                <div class="ques-text">
                    What type of deposit is non-withdrawable?
                </div>
                <div class="option-container3">
                    <div class="radio-label">
                        <label class ="radio" for="eval16">
                            <input class="form-check-input" type="radio" id = "eval16" name="q_five" value="Coop Care" required/>
                            Coop Care 
                            <span></span>
                        </label> <br>
                    </div>
                    <div class="radio-label">
                        <label class ="radio" for="eval17">
                            <input class="form-check-input" type="radio" id = "eval17" name="q_five" value="Share Capital " required/>
                            Share Capital 
                            <span></span>
                        </label> <br>
                    </div>
                    <div class="radio-label">
                        <label class ="radio" for="eval18">
                            <input class="form-check-input" type="radio" id = "eval18" name="q_five" value="Savings Deposit" required/>
                            Savings Deposit
                            <span></span>
                        </label> <br>
                    </div>
                </div>
            </div>

            <div class="home-box instruction-box">
                <div class="ques-num">
                    Question 6 to 10
                </div>
                <div class="ques-text">
                    What type of deposit is non-withdrawable?
                </div>
                <div class="option-container3">
                    <div class="radio-label">
                        <label class ="radio" for="eval19">
                            <input class="form-check-input" type="radio" id = "eval19" name="q_six" value="Democratic Member Control " required/>
                            Democratic Member Control 
                            <span></span>
                        </label> <br>
                    </div>
                    <div class="radio-label">
                        <label class ="radio" for="eval20">
                            <input class="form-check-input" type="radio" id = "eval20" name="q_six" value="Voluntary and Open Membership" required/>
                            Voluntary and Open Membership
                            <span></span>
                        </label> <br>
                    </div>
                    <div class="radio-label">
                        <label class ="radio" for="eval21">
                            <input class="form-check-input" type="radio" id = "eval21" name="q_six" value="Member Economic Participation" required/>
                            Member Economic Participation
                            <span></span>
                        </label> <br>
                    </div>
                </div>
            </div>

            <div class="home-box instruction-box">
                <div class="ques-num">
                    Question 7 to 10
                </div>
                <div class="ques-text">
                    Does IIT Coop offer free trainings and seminars to the member-owners?
                </div>
                <div class="option-container3">
                    <div class="radio-label">
                        <label class ="radio" for="eval22">
                            <input class="form-check-input" type="radio" id = "eval22" name="q_seven" value="Yes" required/>
                            Yes
                            <span></span>
                        </label> <br>
                    </div>
                    <div class="radio-label">
                        <label class ="radio" for="eval23">
                            <input class="form-check-input" type="radio" id = "eval23" name="q_seven" value="No" required/>
                            No
                            <span></span>
                        </label> <br>
                    </div>
                </div>
            </div>

            <div class="home-box instruction-box">
                <div class="ques-num">
                    Question 8 to 10
                </div>
                <div class="ques-text">
                    What type of membership can avail and enjoy the full benefits and privileges as a member-owner?
                </div>
                <div class="option-container3">
                    <div class="radio-label">
                        <label class ="radio" for="eval24">
                            <input class="form-check-input" type="radio" id = "eval24" name="q_eight" value="Regular Membership" required/>
                            Regular Membership
                            <span></span>
                        </label> <br>
                    </div>
                    <div class="radio-label">
                        <label class ="radio" for="eval25">
                            <input class="form-check-input" type="radio" id = "eval25" name="q_eight" value="Associate Membership" required/>
                            Associate Membership
                            <span></span>
                        </label> <br>
                    </div>
                </div>
            </div>

            <div class="home-box instruction-box">
                <div class="ques-num">
                    Question 9 to 10
                </div>
                <div class="ques-text">
                    What is the health care program of IIT Coop?
                </div>
                <div class="option-container3">
                    <div class="radio-label">
                        <label class ="radio" for="eval26">
                            <input class="form-check-input" type="radio" id = "eval26" name="q_nine" value="Sunshine Damayan" required/>
                            Sunshine Damayan
                            <span></span>
                        </label> <br>
                    </div>
                    <div class="radio-label">
                        <label class ="radio" for="eval27">
                            <input class="form-check-input" type="radio" id = "eval27" name="q_nine" value="Coop Care" required/>
                            Coop Care
                            <span></span>
                        </label> <br>
                    </div>
                </div>
            </div>

            <div class="home-box instruction-box">
                <div class="ques-num">
                    Question 10 to 10
                </div>
                <div class="ques-text">
                    What is the name of the online platform that MSU-IIT COOP offer?
                </div>
                <div class="option-container3">
                    <div class="radio-label">
                        <label class ="radio" for="eval28">
                            <input class="form-check-input" type="radio" id = "eval28" name="q_ten" value="KAYA Payment Platform" required/>
                            KAYA Payment Platform
                            <span></span>
                        </label> <br>
                    </div>
                    <div class="radio-label">
                        <label class ="radio" for="eval29">
                            <input class="form-check-input" type="radio" id = "eval29" name="q_ten" value="GCash" required/>
                            GCash
                            <span></span>
                        </label> <br>
                    </div>
                </div>
            </div>

            <!-- <div class="home-box result-box">
                    <h2>Results</h2>  <br> <br>
                <p>Total Score is __</p> <br><br><br>

                <div class="btn-container">
                    <button id="toReview" class="btn btn-next" type="button">Try Again</button>
                    <button id="toReview" class="btn btn-next" type="button">Proceed</button>
                </div>
            </div> -->


    <div class="btns-group">
        <a href="#" class="btn-prev"><i class='bx bx-chevron-left'></i>Back</a>
        <div >
          <input type='submit' class="submit">
        </div>
      </div>
</div>