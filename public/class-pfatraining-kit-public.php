<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://knowhalim.com
 * @since      1.0.0
 *
 * @package    Pfatraining_Kit
 * @subpackage Pfatraining_Kit/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Pfatraining_Kit
 * @subpackage Pfatraining_Kit/public
 * @author     Knowhalim <contact@knowhalim.com>
 */
class Pfatraining_Kit_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Pfatraining_Kit_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Pfatraining_Kit_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/pfatraining-kit-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Pfatraining_Kit_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Pfatraining_Kit_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/pfatraining-kit-public.js', array( 'jquery' ), $this->version, false );

	}

}



add_shortcode('pfa_training_mcq','pfatrain_mcq');
function pfatrain_mcq(){
    add_action('wp_footer','pfatrain_mcq_js');
    $form ='<div class="container">
        <h2 class="psytitle">Psychological First Aid and Stress Management Assessment Practice</h2>
       <div id="khinstruction">Welcome! Please choose the right answer based on the question. Your score will be aggregated at the end of the assessment practice but you will be given the right answer immediately. At the same time, the Next button will appear. Once you have acknowledge the answer, just click the Next button to proceed. Please remember, this is just an assessment practice to gauge your understand of the subject. All your answers will be anonymous and we will not collect any information from the assessment.</div>
        <div class="quiz">
            <div class="question"></div><br>
            <ul class="options">
            </ul>
			<div id="khscored" style="text-align:right;">Question: 1/37</div>
            <button class="next-button">Next</button>
        </div>
        <div class="results">
            <h2>Your Results</h2>
            <p class="score"></p>
            <button class="restart-button">Restart Quiz</button>
        </div>
    </div>';
    return $form;
}

function pfatrain_mcq_js(){
    ?>

<script>
jQuery(document).ready(function () {
    const questions = [
    {
        text: "What is the first step in providing psychological first aid?",
        options: [
            "Identify the person's needs",
            "Establish rapport",
            "Offer practical assistance",
            "Listen actively"
        ],
        correctIndex: 1,
        explanation:
            "The first step in providing psychological first aid is to establish rapport with the person in need."
    },
    {
        text: "Which of the following is NOT a good stress management technique?",
        options: [
            "Deep breathing exercises",
            "Physical exercise",
            "Procrastination",
            "Meditation"
        ],
        correctIndex: 2,
        explanation:
            "Procrastination is not a good stress management technique, as it can increase stress levels over time."
    },
    {
        text: "How can you help a friend who is experiencing a difficult time?",
        options: [
            "Ignore their feelings",
            "Tell them to snap out of it",
            "Be empathetic and offer a listening ear",
            "Constantly give them advice"
        ],
        correctIndex: 2,
        explanation:
            "Being empathetic and offering a listening ear is an effective way to help a friend who is experiencing a difficult time."
    },
    {
        text: "Which of the following is a healthy coping strategy?",
        options: [
            "Overeating",
            "Excessive alcohol consumption",
            "Getting adequate sleep",
            "Avoiding social interactions"
        ],
        correctIndex: 2,
        explanation:
            "Getting adequate sleep is a healthy coping strategy that promotes physical and mental well-being."
    },
    {
        text: "What is an important aspect of active listening?",
        options: [
            "Interrupting the speaker to share your opinion",
            "Thinking about your response while the other person is talking",
            "Paraphrasing and reflecting back the speaker's feelings",
            "Changing the subject to something more interesting"
        ],
        correctIndex: 2,
        explanation:
            "Paraphrasing and reflecting back the speaker's feelings is an important aspect of active listening, as it shows understanding and empathy."
    },
    // ...existing questions...
{
    text: "Which of the following should be avoided when helping someone in distress?",
    options: [
        "Validating their feelings",
        "Showing empathy",
        "Minimizing their emotions",
        "Offering support"
    ],
    correctIndex: 2,
    explanation:
        "Minimizing someone's emotions can make them feel invalidated and unsupported, which is not helpful when they are in distress."
},
{
    text: "What type of social support is most helpful during a difficult time?",
    options: [
        "Emotional support",
        "Informational support",
        "Tangible support",
        "All of the above"
    ],
    correctIndex: 3,
    explanation:
        "Emotional, informational, and tangible support are all important types of social support that can be helpful during a difficult time."
},
{
    text: "How can you help someone who is experiencing a panic attack?",
    options: [
        "Tell them to calm down",
        "Encourage them to take slow, deep breaths",
        "Ask them to think about something else",
        "Ignore the situation"
    ],
    correctIndex: 1,
    explanation:
        "Encouraging someone to take slow, deep breaths can help them regain control and reduce the intensity of a panic attack."
},
{
    text: "Which of the following is a sign of burnout?",
    options: [
        "Increased energy",
        "Feeling detached or indifferent about work",
        "Improved concentration",
        "Higher motivation"
    ],
    correctIndex: 1,
    explanation:
        "Feeling detached or indifferent about work is a sign of burnout, which may result from chronic stress and insufficient coping strategies."
},
{
    text: "Which of the following activities can help improve mental well-being?",
    options: [
        "Spending time in nature",
        "Watching TV all day",
        "Isolating oneself from friends and family",
        "Consuming large amounts of caffeine"
    ],
    correctIndex: 0,
    explanation:
        "Spending time in nature has been shown to improve mental well-being by reducing stress, increasing relaxation, and promoting a sense of connection."
}
,
// ...existing questions...
{
    text: "What is the importance of setting boundaries when supporting someone in need?",
    options: [
        "It allows you to maintain your well-being",
        "It creates emotional distance",
        "It shows the person you are not interested in helping",
        "It prevents you from getting too close"
    ],
    correctIndex: 0,
    explanation:
        "Setting boundaries is important because it allows you to maintain your well-being while providing support to someone in need."
},
{
    text: "What is a common symptom of stress?",
    options: [
        "Increased appetite",
        "Irritability",
        "Decreased heart rate",
        "Increased concentration"
    ],
    correctIndex: 1,
    explanation:
        "Irritability is a common symptom of stress, as the body's stress response can affect mood and emotional regulation."
},
{
    text: "How can you support a friend who has recently experienced a loss?",
    options: [
        "Tell them to move on",
        "Acknowledge their pain and offer comfort",
        "Avoid talking about the loss",
        "Provide solutions to their problems"
    ],
    correctIndex: 1,
    explanation:
        "Acknowledging a friend's pain and offering comfort shows empathy and support during their grieving process."
},
{
    text: "What is the main goal of psychological first aid?",
    options: [
        "To diagnose mental health disorders",
        "To provide immediate relief and support",
        "To offer long-term therapy",
        "To prevent the person from seeking professional help"
    ],
    correctIndex: 1,
    explanation:
        "The main goal of psychological first aid is to provide immediate relief and support to individuals in crisis or distress."
},
{
    text: "Which of the following is a good self-care practice?",
    options: [
        "Ignoring your emotions",
        "Prioritizing your needs and well-being",
        "Neglecting personal hygiene",
        "Overworking yourself"
    ],
    correctIndex: 1,
    explanation:
        "Prioritizing your needs and well-being is a good self-care practice, as it promotes overall physical and mental health."
},
{
    text: "What is an effective way to manage stress in the long-term?",
    options: [
        "Developing healthy coping strategies",
        "Relying on quick fixes, like caffeine or alcohol",
        "Avoiding stressors altogether",
        "Suppressing emotions"
    ],
    correctIndex: 0,
    explanation:
        "Developing healthy coping strategies, such as exercise, mindfulness, and social support, can help manage stress in the long-term."
}
,
// ...existing questions...
{
    text: "Which of the following can be a positive outcome of stress?",
    options: [
        "Chronic fatigue",
        "Increased motivation",
        "Decreased immune function",
        "Anxiety disorders"
    ],
    correctIndex: 1,
    explanation:
        "Increased motivation can be a positive outcome of stress, as it may encourage individuals to take action and achieve goals."
},
{
    text: "What should you do when someone shares their feelings with you?",
    options: [
        "Try to fix their problems",
        "Listen empathetically and validate their emotions",
        "Tell them they are overreacting",
        "Share your own problems"
    ],
    correctIndex: 1,
    explanation:
        "Listening empathetically and validating their emotions shows that you care and are there to support them."
},
{
    text: "Which of the following is a healthy way to express emotions?",
    options: [
        "Journaling",
        "Yelling at others",
        "Bottling up feelings",
        "Engaging in risky behaviors"
    ],
    correctIndex: 0,
    explanation:
        "Journaling is a healthy way to express emotions, as it allows individuals to process and understand their feelings."
},
{
    text: "Why is it important to take breaks during periods of high stress?",
    options: [
        "To increase stress levels",
        "To recharge and prevent burnout",
        "To avoid completing tasks",
        "To distract oneself from responsibilities"
    ],
    correctIndex: 1,
    explanation:
        "Taking breaks during periods of high stress is important to recharge and prevent burnout, allowing for better overall well-being and productivity."
},
{
    text: "What is the role of self-compassion in coping with stress?",
    options: [
        "It increases self-criticism",
        "It helps individuals be kinder to themselves",
        "It promotes avoidance of stressors",
        "It leads to self-blame"
    ],
    correctIndex: 1,
    explanation:
        "Self-compassion plays an important role in coping with stress, as it helps individuals be kinder to themselves and fosters resilience during challenging times."
},
{
    text: "Which of the following is NOT a sign of emotional distress?",
    options: [
        "Mood swings",
        "Increased irritability",
        "Physical pain",
        "Increased focus and concentration"
    ],
    correctIndex: 3,
    explanation:
        "Increased focus and concentration is not typically a sign of emotional distress, while mood swings, increased irritability, and physical pain may indicate a struggle with emotional well-being."
},
{
    text: "What can you do to support someone who is hesitant to seek professional help?",
    options: [
        "Force them to see a therapist",
        "Disregard their concerns",
        "Provide information and encourage open discussion",
        "Tell them they don't need help"
    ],
    correctIndex: 2,
    explanation:
        "Providing information about available resources and encouraging open discussion can help support someone who is hesitant to seek professional help, without forcing or dismissing their concerns."
}
,
// ...existing questions...
{
    text: "How can you maintain a healthy work-life balance?",
    options: [
        "Work long hours and skip breaks",
        "Set boundaries between work and personal life",
        "Prioritize work over personal life",
        "Ignore work responsibilities"
    ],
    correctIndex: 1,
    explanation:
        "Setting boundaries between work and personal life is essential for maintaining a healthy work-life balance and promoting overall well-being."
},
{
    text: "What is a benefit of practicing mindfulness?",
    options: [
        "Increased stress levels",
        "Greater self-awareness and emotional regulation",
        "Decreased focus and concentration",
        "Reduced empathy"
    ],
    correctIndex: 1,
    explanation:
        "Practicing mindfulness can lead to greater self-awareness and emotional regulation, which can improve overall mental health and well-being."
},
{
    text: "What can you do to help someone who is experiencing symptoms of anxiety?",
    options: [
        "Tell them to stop worrying",
        "Encourage them to practice relaxation techniques",
        "Belittle their fears",
        "Avoid discussing their concerns"
    ],
    correctIndex: 1,
    explanation:
        "Encouraging someone to practice relaxation techniques, such as deep breathing or progressive muscle relaxation, can help alleviate symptoms of anxiety."
},
{
    text: "Which of the following is a sign of good mental health?",
    options: [
        "Difficulty coping with stress",
        "Lack of interest in daily activities",
        "Strong interpersonal relationships",
        "Persistent sadness"
    ],
    correctIndex: 2,
    explanation:
        "Strong interpersonal relationships are a sign of good mental health, as they indicate the ability to form and maintain connections with others."
},
{
    text: "How can you help a friend who is struggling with low self-esteem?",
    options: [
        "Criticize their actions and decisions",
        "Validate their feelings and offer encouragement",
        "Compare them to others",
        "Ignore their struggles"
    ],
    correctIndex: 1,
    explanation:
        "Validating a friend's feelings and offering encouragement can help boost their self-esteem and support their overall well-being."
}
,
// ...existing questions...
{
    text: "What is an effective communication skill when helping someone in distress?",
    options: [
        "Interrupting them frequently",
        "Active listening",
        "Being judgmental",
        "Offering unsolicited advice"
    ],
    correctIndex: 1,
    explanation:
        "Active listening is an effective communication skill when helping someone in distress, as it demonstrates empathy and understanding."
},
{
    text: "What is the purpose of using grounding techniques during a stressful situation?",
    options: [
        "To increase anxiety",
        "To bring focus back to the present moment",
        "To avoid dealing with emotions",
        "To worsen physical symptoms"
    ],
    correctIndex: 1,
    explanation:
        "The purpose of using grounding techniques during a stressful situation is to bring focus back to the present moment, which can help reduce anxiety and emotional distress."
},
{
    text: "Why is it important to practice self-care when supporting someone in need?",
    options: [
        "To show that you don't care about their problems",
        "To preserve your own well-being and prevent compassion fatigue",
        "To avoid helping them",
        "To make them feel guilty"
    ],
    correctIndex: 1,
    explanation:
        "Practicing self-care when supporting someone in need is important to preserve your own well-being and prevent compassion fatigue, which can negatively affect your ability to help others."
},
{
    text: "Which of the following is NOT a healthy coping mechanism?",
    options: [
        "Exercising regularly",
        "Using alcohol or drugs to numb emotions",
        "Practicing relaxation techniques",
        "Connecting with supportive friends and family"
    ],
    correctIndex: 1,
    explanation:
        "Using alcohol or drugs to numb emotions is not a healthy coping mechanism, as it can lead to dependency and worsen mental health issues in the long term."
}
,
// ...existing questions...
{
    text: "What is the role of empathy in providing emotional support?",
    options: [
        "Empathy is not important",
        "Empathy helps you understand and share the feelings of others",
        "Empathy allows you to judge others",
        "Empathy means you must agree with the person's actions"
    ],
    correctIndex: 1,
    explanation:
        "Empathy plays a crucial role in providing emotional support, as it helps you understand and share the feelings of others, fostering connection and trust."
},
{
    text: "Which of the following activities can help reduce stress?",
    options: [
        "Engaging in a hobby you enjoy",
        "Constantly checking social media",
        "Procrastinating on tasks",
        "Overloading your schedule"
    ],
    correctIndex: 0,
    explanation:
        "Engaging in a hobby you enjoy can help reduce stress, as it provides a healthy distraction and promotes relaxation."
},
{
    text: "What is an effective way to build resilience during difficult times?",
    options: [
        "Suppressing emotions",
        "Focusing on negative thoughts",
        "Developing a strong support network",
        "Isolating oneself from others"
    ],
    correctIndex: 2,
    explanation:
        "Developing a strong support network is an effective way to build resilience during difficult times, as it provides emotional and practical support."
},
{
    text: "What is the goal of cognitive restructuring?",
    options: [
        "To avoid thinking",
        "To replace negative thoughts with more realistic ones",
        "To suppress emotions",
        "To constantly worry about the future"
    ],
    correctIndex: 1,
    explanation:
        "The goal of cognitive restructuring is to replace negative thoughts with more realistic ones, promoting healthier thinking patterns and improved mental health."
},
{
    text: "Why is it important to recognize the signs of burnout?",
    options: [
        "To prevent seeking help",
        "To maintain high levels of stress",
        "To take action and implement self-care strategies",
        "To avoid acknowledging one's emotions"
    ],
    correctIndex: 2,
    explanation:
        "Recognizing the signs of burnout is important because it allows individuals to take action and implement self-care strategies to prevent further emotional and physical decline."
}

];


    let currentQuestionIndex = 0;
    let correctAnswers = 0;

jQuery(".next-button").hide();
    function displayQuestion() {
        const question = questions[currentQuestionIndex];
        jQuery(".question").text('Question: ' + question.text);
        jQuery(".options").html("");

        question.options.forEach((option, index) => {
            const li = jQuery("<li>").text(option).data("index", index);
            li.on("click", checkAnswer);
            jQuery(".options").append(li);
        });
    }

    function showExplanation(isCorrect) {
        const explanation = questions[currentQuestionIndex].explanation;
        let result = isCorrect ? "Correct!" : "Incorrect.";

        jQuery(".question").html(`${result} ${explanation}`);
        //setTimeout(nextQuestion, 5000);


    }


    function checkAnswer() {
        const selectedIndex = jQuery(this).data("index");
        const correctIndex = questions[currentQuestionIndex].correctIndex;

        jQuery(".options li").off("click");

        if (selectedIndex === correctIndex) {
            correctAnswers++;
            jQuery(this).addClass("correct");
            showExplanation(true);
        } else {
            jQuery(this).addClass("incorrect");
            jQuery("li").eq(correctIndex).addClass("correct");
            showExplanation(false);
        }
        jQuery(".next-button").show();
    }

    function nextQuestion() {
        currentQuestionIndex++;
		jQuery('#khscored').html('Question: '+ currentQuestionIndex + '/' + questions.length).css('text-align','right');
        jQuery(".next-button").hide();
        if (currentQuestionIndex < questions.length) {
            displayQuestion();
        } else {
            jQuery(".quiz").hide();
            jQuery(".results .score").text(
                `You got ${correctAnswers} out of ${questions.length} correct.`
            );
            jQuery(".results").show();
        }
    }

    function restartQuiz() {
        currentQuestionIndex = 0;
        correctAnswers = 0;
        jQuery(".quiz").show();
        jQuery(".results").hide();
        displayQuestion();
    }

    jQuery(".next-button").on("click", function () {
        jQuery(this).hide();
        nextQuestion();
    });

    jQuery(".restart-button").on("click", restartQuiz);

    displayQuestion();
});

</script>

<style>
h2.psytitle{
        font-size: 26px;
    line-height: 1.2;
}

.options {
    list-style-type: none;
    padding: 0;
}
ul.options{
    padding-left:0px;
}
.options li {
    background-color: #e0e0e0;
    border-radius: 5px;
    padding: 1rem;
    margin-bottom: 1rem;
    cursor: pointer;
}

.options li.correct {
    background-color: #8bc34a;
}

.options li.incorrect {
    background-color: #f44336;
}

div#khinstruction {
    background: #fef7b5;
    padding: 14px 16px;
    border-radius: 10px;
    margin-bottom: 10px;
}

button {
    display: block;
    margin-top: 1rem;
    padding: 0.5rem 1rem;
    font-size: 1rem;
    border-radius: 5px;
    cursor: pointer;
}

button.next-button {
    background-color: #2196f3;
    color: white;
}

button.restart-button {
    background-color: #4caf50;
    color: white;
    display: none;
}

.question{
    font-weight:bold;
}

.results {
    display: none;
}

</style>
    <?php
}


add_shortcode('pfa_training_kit','pfatraining_qnaire');

function pfatraining_qnaire(){
	add_action('wp_footer','pfatraining_qnaire_js');
	$display = '<div class="container mt-4">
  <h1>Psychological Services Officer Learning Program</h1>
  <div id="quiz">
    <div class="question">
      <h2 class="question-text"></h2>
      <div class="choices"></div>
    </div>
    <button id="next" class="btn btn-primary mt-3" disabled>Next</button>
  </div>
  <div id="result" class="mt-4 d-none">
    <h2>Quiz Result</h2>
    <p>Your score: <span id="score"></span><span id="tscore"></span></p>
    <button id="restart" class="btn btn-primary">Restart</button>
  </div>
</div>';
	return $display;
}


function pfatraining_qnaire_js(){
	?>
<script>
const questions = [
  {
    text: "What is the primary goal of PFA?",
    choices: [
      "To provide professional counseling",
      "To reduce stress and foster adaptive functioning",
      "To diagnose mental health disorders",
      "To prescribe medication for mental health issues"
    ],
    answer: 1
  },
  {
    text: "What is the main purpose of CISM?",
    choices: [
      "To provide financial support",
      "To offer legal advice",
      "To mitigate the impact of critical incidents and accelerate recovery",
      "To diagnose mental health disorders"
    ],
    answer: 2
  },
  {
    text: "What is the main objective of CISD?",
    choices: [
      "To treat physical injuries",
      "To help individuals process and cope with the emotional impact of critical incidents",
      "To provide medication for mental health issues",
      "To offer financial assistance"
    ],
    answer: 1
  },
  {
    text: "What is a key component of breaking bad news?",
    choices: [
      "Minimizing emotional reactions",
      "Avoiding difficult topics",
      "Preparation, communication, and providing support",
      "Focusing on the positives"
    ],
    answer: 2
  },
  {
    text: "What is the SPIKES protocol?",
    choices: [
      "A medication regimen for mental health disorders",
      "A six-step protocol for breaking bad news to patients and their families",
      "A physical therapy plan for recovering from injuries",
      "A financial planning tool"
    ],
    answer: 1
  },
  {
    text: "What is the primary goal of victim care?",
    choices: [
      "To assign blame for the incident",
      "To support the physical, emotional, and psychological well-being of victims and their families",
      "To provide legal advice",
      "To treat physical injuries"
    ],
    answer: 1
  },
  {
    text: "What are some common reactions to traumatic events?",
    choices: [
      "Indifference, apathy, and boredom",
      "Excitement, joy, and enthusiasm",
      "Shock, disbelief, anger, sadness, and anxiety",
      "Happiness, contentment, and satisfaction"
    ],
    answer: 2
  },
  {
    text: "What is the RAPID model in PFA?",
    choices: [
      "Rest, Activity, Play, Interaction, and Diet",
      "Reflective listening, Assessment, Prioritization, Intervention, and Disposition",
      "Reassurance, Affirmation, Patience, Instruction, and Documentation",
      "Recognition, Action, Planning, Implementation, and Decision-making"
    ],
    answer: 1
  },
  {
    text: "What are the core actions of PFA?",
    choices: [
      "Contact and engagement, Safety and Comfort, Stabilization, Information Gathering, Practical Assistance, Connection with Social Supports, Information on Coping, and Linkage with Collaborative Services",
      "Diagnosis, Treatment, Prevention, and Rehabilitation",
      "Evaluation, Planning, Implementation, and Follow-up",
      "Screening, Assessment, Intervention, and Referral"
    ],
    answer: 0
  },{
    text: "What is the importance of self-care for psychological services providers?",
    choices: [
      "To prevent burnout, maintain well-being, and ensure effective care for clients",
      "To improve physical strength and endurance",
      "To increase work hours and productivity",
      "To gain recognition and awards"
    ],
    answer: 0
  },
  {
    text: "What is the difference between CISM and CISD?",
    choices: [
      "CISM is a comprehensive system, while CISD is a specific debriefing process within the CISM framework",
      "CISM focuses on physical health, while CISD focuses on mental health",
      "CISM is a medication regimen, while CISD is a therapy program",
      "CISM is for adults, while CISD is for children"
    ],
    answer: 0
  },
  {
    text: "What is an example of practical assistance in PFA?",
    choices: [
      "Helping individuals locate missing family members, access medical care, or secure temporary housing",
      "Prescribing medication for mental health issues",
      "Providing legal advice",
      "Teaching relaxation techniques"
    ],
    answer: 0
  },
  {
    text: "What are some strategies for managing strong emotions when breaking bad news?",
    choices: [
      "Ignore the emotions",
      "Acknowledge the emotions, provide reassurance, and offer support",
      "Change the subject",
      "Focus on the positive aspects of the situation"
    ],
    answer: 1
  },
  {
    text: "How can you help a victim develop a sense of safety after a traumatic event?",
    choices: [
      "Provide information, offer practical assistance, and connect them with social supports",
      "Tell them everything will be fine",
      "Avoid discussing the traumatic event",
      "Encourage them to return to normal activities immediately"
    ],
    answer: 0
  },
  {
    text: "What are some common barriers to effective communication when breaking bad news?",
    choices: [
      "Fear of causing distress, lack of training, and inadequate support systems",
      "Overconfidence, excessive talking, and impatience",
      "Calmness, empathy, and active listening",
      "Availability of resources, planning, and time management"
    ],
    answer: 0
  },
  {
    text: "What are some strategies for building rapport and trust with victims?",
    choices: [
      "Active listening, empathy, and validating their feelings and experiences",
      "Offering solutions and advice immediately",
      "Focusing on the positive aspects of the situation",
      "Discussing unrelated topics"
    ],
    answer: 0
  },
  {
    text: "What does the 'S' in the SPIKES protocol stand for?",
    choices: [
      "Sympathy",
      "Summary",
      "Strategy",
      "Setting"
    ],
    answer: 3
  },
  {
    text: "Which of the following is a key component of PFA?",
    choices: [
      "Diagnosing mental health disorders",
      "Prescribing medication for mental health issues",
      "Providing professional counseling",
      "Stabilization"
    ],
    answer: 3
  },
  {
    text: "Which of the following is an important aspect of victim care?",
    choices: [
      "Focusing on the victim's mistakes",
      "Minimizing the impact of the traumatic event",
      "Connecting the victim with social supports",
      "Avoiding discussion of emotions"
    ],
    answer: 2
  },{
    text: "What is the main goal of Psychological Debriefing?",
    choices: [
      "To provide legal advice",
      "To reduce the risk of developing psychological disorders following a critical incident",
      "To treat physical injuries",
      "To offer financial assistance"
    ],
    answer: 1
  },
  {
    text: "What is the role of empathy in PFA?",
    choices: [
      "To minimize emotional reactions",
      "To demonstrate understanding and validate the individual's feelings and experiences",
      "To diagnose mental health disorders",
      "To prescribe medication for mental health issues"
    ],
    answer: 1
  },
  {
    text: "What is an example of emotional support in victim care?",
    choices: [
      "Providing financial assistance",
      "Offering legal advice",
      "Listening actively and validating the victim's feelings and experiences",
      "Focusing on the positives"
    ],
    answer: 2
  },
  {
    text: "What does the 'I' in the SPIKES protocol stand for?",
    choices: [
      "Intervention",
      "Information",
      "Investigation",
      "Imparting"
    ],
    answer: 3
  },
  {
    text: "What are some factors that can influence an individual's reaction to a critical incident?",
    choices: [
      "Prior experiences, coping mechanisms, and social support systems",
      "Weather, time of day, and location",
      "Language, nationality, and religion",
      "Income, education level, and occupation"
    ],
    answer: 0
  },
  {
    text: "Which of the following is a core component of CISM?",
    choices: [
      "Providing financial assistance",
      "Diagnosing and treating mental health disorders",
      "Prescribing medication for mental health issues",
      "Assessing needs, providing support, and facilitating recovery"
    ],
    answer: 3
  },
  {
    text: "What is an example of a critical incident?",
    choices: [
      "Receiving a promotion at work",
      "Graduating from college",
      "Experiencing a natural disaster",
      "Celebrating a birthday"
    ],
    answer: 2
  },
  {
    text: "What is the role of active listening in victim care?",
    choices: [
      "To demonstrate understanding, validate feelings, and build trust",
      "To minimize emotional reactions",
      "To diagnose mental health disorders",
      "To prescribe medication for mental health issues"
    ],
    answer: 0
  },
  {
    text: "What is an important consideration when breaking bad news?",
    choices: [
      "Avoiding eye contact",
      "Focusing on the positive aspects of the situation",
      "Tailoring communication to the individual's needs, preferences, and level of understanding",
      "Using technical jargon"
    ],
    answer: 2
  },
  {
    text: "Which of the following is an important aspect of PFA?",
    choices: [
      "Diagnosing and treating mental health disorders",
      "Prescribing medication for mental health issues",
      "Providing professional counseling",
      "Helping individuals develop coping skills and promoting resilience"
    ],
    answer: 3
  },{
    text: "You are a psychological services officer providing PFA after a natural disaster. A survivor is expressing feelings of guilt for not being able to save their neighbor. What should you do?",
    choices: [
      "Tell them it's not their fault",
      "Encourage them to focus on the positive aspects of the situation",
      "Listen actively, validate their feelings, and offer empathy",
      "Offer financial assistance"
    ],
    answer: 2
  },
  {
    text: "During a CISD session, a participant seems reluctant to share their feelings. What is the best approach?",
    choices: [
      "Pressure them to share their feelings",
      "Ignore their reluctance and focus on others",
      "Encourage them to share, but respect their decision if they choose not to",
      "End the session early"
    ],
    answer: 2
  },
  {
    text: "You are breaking bad news to a family about the loss of a loved one. The family is visibly upset and emotional. How should you proceed?",
    choices: [
      "Change the subject",
      "Offer condolences, acknowledge their emotions, and provide support",
      "Tell them everything will be fine",
      "Focus on the positive aspects of the situation"
    ],
    answer: 1
  },
  {
    text: "A victim of a traumatic event is having difficulty sleeping and concentrating. Which PFA strategy would be most appropriate?",
    choices: [
      "Teach relaxation techniques and encourage the development of a consistent sleep routine",
      "Prescribe medication for mental health issues",
      "Provide legal advice",
      "Ignore the issue"
    ],
    answer: 0
  },
  {
    text: "During a CISM intervention, a team member discloses that they have been experiencing symptoms of depression. What should you do?",
    choices: [
      "Minimize the symptoms",
      "Refer them to appropriate mental health services for further evaluation and support",
      "Tell them everything will be fine",
      "Focus on the positive aspects of the situation"
    ],
    answer: 1
  },
  {
    text: "A victim of a crime is feeling overwhelmed by the prospect of dealing with legal issues. How can you provide practical assistance?",
    choices: [
      "Offer to handle the legal issues on their behalf",
      "Connect them with legal resources and social supports",
      "Tell them not to worry",
      "Prescribe medication for mental health issues"
    ],
    answer: 1
  },
  {
    text: "You are providing PFA to a survivor of a traumatic event. They express feelings of hopelessness about the future. What is an appropriate response?",
    choices: [
      "Dismiss their feelings",
      "Focus on the positive aspects of the situation",
      "Encourage the development of coping skills and promote resilience",
      "Offer financial assistance"
    ],
    answer: 2
  },
  {
    text: "During a CISD session, a participant becomes highly emotional and starts crying. What is the best approach?",
    choices: [
      "Ignore their emotions",
      "Acknowledge their emotions, provide reassurance, and offer support",
      "End the session early",
      "Focus on the positive aspects of the situation"
    ],
    answer: 1
  },
  {
    text: "A victim of a traumatic event is having difficulty making decisions about their recovery. How can you help them develop a sense of self-efficacy?",
    choices: [
      "Make decisions for them",
      "Encourage them to identify their strengths and resources, and support their decision-making process",
"Tell them everything will be fine",
"Focus on the positive aspects of the situation"
],
answer: 1
},
{
text: "You are providing victim care to an individual who has lost their job due to a traumatic event. They express concerns about their financial situation. What is an appropriate response?",
choices: [
"Dismiss their concerns",
"Offer financial assistance",
"Connect them with relevant resources and social support networks",
"Focus on the positive aspects of the situation"
],
answer: 2
},
	{
text: "When breaking bad news, which communication model can help guide the process?",
choices: [
"ABCDE Model",
"SPIKES Model",
"RICE Model",
"PEACH Model"
],
answer: 1
}
];
shuffle(questions);

let currentQuestionIndex = 0;
let score = 0;

function pfatraining_displayQuestion() {
	jQuery('#result').hide();
	let t_quiz = questions.length;
	jQuery('#next').css('margin-top','20px');
	//const questions = shuffle(questions);
	jQuery('#tscore').html('/'+t_quiz);
  const question = questions[currentQuestionIndex];
  jQuery(".question-text").text(question.text);
  jQuery(".choices").empty();

  question.choices.forEach((choice, index) => {
    const choiceElement = jQuery(`<div class="form-check"><input class="form-check-input" type="radio" name="choice" id="choice${index}" value="${index}"><label class="form-check-label" for="choice${index}">${choice}</label></div>`);
    jQuery(".choices").append(choiceElement);
  });

  jQuery("input[name='choice']").on("change", () => {
    jQuery("#next").prop("disabled", false);
  });
}

jQuery("#next").on("click", () => {
  const selectedChoice = parseInt(jQuery("input[name='choice']:checked").val());
  if (questions[currentQuestionIndex].answer === selectedChoice) {
    score++;
  }

  currentQuestionIndex++;

  if (currentQuestionIndex < questions.length) {
    pfatraining_displayQuestion();
    jQuery("#next").prop("disabled", true);
  } else {
	  jQuery('#result').show();
    jQuery("#quiz").hide();
    jQuery("#score").text(score);
    jQuery("#result").removeClass("d-none");
  }
});

jQuery("#restart").on("click", () => {
  currentQuestionIndex = 0;
  score = 0;
  pfatraining_displayQuestion();
  jQuery("#next").prop("disabled", true);
  jQuery("#result").addClass("d-none");
  jQuery("#quiz").show();
});

function shuffle(array) {
  for (let i = array.length - 1; i > 0; i--) {
    const j = Math.floor(Math.random() * (i + 1));
    [array[i], array[j]] = [array[j], array[i]]; // Swap the elements
  }
  return array;
}
	
	
pfatraining_displayQuestion();
</script>
<?php 
}