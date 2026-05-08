const toggle = document.querySelector('.menu-toggle');
const nav = document.querySelector('.nav');

if (toggle && nav) {
  toggle.addEventListener('click', () => {
    nav.classList.toggle('is-open');
  });
}

const revealTargets = document.querySelectorAll(
  '.content-section, .split, .stats div, .feature-grid article, .process-grid div, .category-grid span, .empty-state, .contact-layout, .card-form, .contact-card, .job-card'
);

revealTargets.forEach((target) => target.classList.add('reveal'));

if ('IntersectionObserver' in window) {
  const revealObserver = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.classList.add('is-visible');
        revealObserver.unobserve(entry.target);
      }
    });
  }, { threshold: 0.14, rootMargin: '0px 0px -40px 0px' });

  revealTargets.forEach((target) => revealObserver.observe(target));
} else {
  revealTargets.forEach((target) => target.classList.add('is-visible'));
}

const tiltTargets = document.querySelectorAll('.feature-grid article, .process-grid div, .job-card, .split img, .resume-panel, .contact-card');

tiltTargets.forEach((target) => {
  target.addEventListener('mousemove', (event) => {
    const rect = target.getBoundingClientRect();
    const x = ((event.clientX - rect.left) / rect.width - 0.5) * 2;
    const y = ((event.clientY - rect.top) / rect.height - 0.5) * 2;
    target.style.transform = `perspective(900px) rotateX(${(-y * 3).toFixed(2)}deg) rotateY(${(x * 3).toFixed(2)}deg) translateY(-6px)`;
  });

  target.addEventListener('mouseleave', () => {
    target.style.transform = '';
  });
});

const creativeHrKnowledge = [
  {
    keywords: ['service', 'services', 'what do you do', 'help'],
    answer: 'Creative HR Service mainly offers two services: Recruitment and Resume Writing. We help employers find suitable candidates and help job seekers prepare professional resumes.'
  },
  {
    keywords: ['recruitment', 'hiring', 'hire', 'candidate', 'staff', 'placement', 'job placement'],
    answer: 'Our recruitment service supports freshers, experienced candidates, factory staff, office staff, sales, HR/admin, accounts, IT, engineers, operators, supervisors, managers, pharma, chemical, plastics, packaging, textile, and garment hiring around Vapi and nearby areas.'
  },
  {
    keywords: ['resume', 'cv', 'cover letter', 'linkedin', 'profile'],
    answer: 'Our resume writing service includes new resume creation, resume redesign, professional CV writing, fresher resumes, experienced resumes, cover letters, and LinkedIn profile improvement.'
  },
  {
    keywords: ['job', 'opening', 'vacancy', 'current job', 'current opening'],
    answer: 'Current openings will be updated on the Current Jobs page. You can upload your resume now, and the team can contact you when a suitable opening is available.'
  },
  {
    keywords: ['upload', 'resume upload', 'submit resume', 'apply'],
    answer: 'You can upload your resume from the homepage resume upload section. Please share your name, mobile number, email, city, experience, preferred role, and resume file.'
  },
  {
    keywords: ['contact', 'phone', 'mobile', 'call', 'whatsapp'],
    answer: 'You can contact Creative HR Service at +91 9327434300. You can also use the enquiry form or WhatsApp button on the Contact page.'
  },
  {
    keywords: ['email', 'mail'],
    answer: 'The official email address is info@creativehr.in.'
  },
  {
    keywords: ['address', 'location', 'office', 'map', 'visit'],
    answer: 'Office address: 115-116, 01st Floor, Fortune Square 1, Behind TBZ Showroom, Above SBI Bank, Vapi-Daman Road, Chala, Vapi, Dist-Valsad, Gujarat - 396195.'
  },
  {
    keywords: ['area', 'city', 'vapi', 'nearby', 'daman', 'valsad', 'silvassa'],
    answer: 'Creative HR Service focuses on Vapi and nearby areas, including Chala, GIDC, Daman, Valsad, Silvassa, and nearby industrial/business locations.'
  },
  {
    keywords: ['founder', 'director', 'owner', 'ranjan'],
    answer: 'The company profile mentions J. Ranjan Senapati as Director and Founder, with 12+ years of experience in recruitment and talent management.'
  },
  {
    keywords: ['team', 'arun', 'bharti', 'chandan'],
    answer: 'The company profile mentions Arun Pandey as Head BDM, Bharti Rout as Head Operation, and Mr. Chandan as Head Talent Acquisition.'
  },
  {
    keywords: ['founded', 'started', 'established', 'year'],
    answer: 'Creative HR Service was founded in 2014.'
  },
  {
    keywords: ['process', 'how it works', 'steps'],
    answer: 'Recruitment process: client consultation, job description creation, job advertising, candidate sourcing, candidate screening, shortlist presentation, client interviews, offer support, onboarding, and post-placement support.'
  },
  {
    keywords: ['industry', 'pharma', 'chemical', 'plastic', 'packaging', 'textile', 'garment'],
    answer: 'Creative HR Service supports hiring categories across pharma, chemical, plastics, packaging, textile, garment, office, factory, technical, and non-technical roles.'
  },
  {
    keywords: ['problem', 'issue', 'support', 'help me', 'confused'],
    answer: 'I can help you understand services, upload resume guidance, enquiry steps, contact details, job openings, and resume writing support. For personal or urgent hiring/job matters, please contact +91 9327434300.'
  }
];

function creativeHrBotReply(message) {
  const text = message.toLowerCase();
  const matched = creativeHrKnowledge.find((item) => item.keywords.some((keyword) => text.includes(keyword)));

  if (matched) {
    return matched.answer;
  }

  if (text.length < 3) {
    return 'Please type your question. I can help with recruitment, resume writing, job openings, contact details, address, and resume upload.';
  }

  return 'I want to answer accurately. I can help with Creative HR Service recruitment, resume writing, current jobs, resume upload, contact details, office address, and service process. For anything specific, please call or WhatsApp +91 9327434300.';
}

function addChatMessage(panel, text, type) {
  const row = document.createElement('div');
  row.className = `chat-message ${type}`;
  row.textContent = text;
  panel.appendChild(row);
  panel.scrollTop = panel.scrollHeight;
}

function addTypingIndicator(panel) {
  const row = document.createElement('div');
  row.className = 'chat-message bot typing-message';
  row.innerHTML = '<span></span><span></span><span></span>';
  panel.appendChild(row);
  panel.scrollTop = panel.scrollHeight;
  return row;
}

function botReplyWithTyping(panel, question) {
  const typing = addTypingIndicator(panel);
  const reply = creativeHrBotReply(question);
  const delay = Math.min(1350, Math.max(620, reply.length * 12));

  setTimeout(() => {
    typing.remove();
    addChatMessage(panel, reply, 'bot');
  }, delay);
}

function createChatbot() {
  if (document.querySelector('.chatbot-widget')) return;

  const widget = document.createElement('section');
  widget.className = 'chatbot-widget';
  widget.innerHTML = `
    <button class="chatbot-toggle" type="button" aria-label="Open Creative HR assistant">
      <span class="bot-avatar"><span></span></span>
      <strong>Ask HR Bot</strong>
    </button>
    <div class="chatbot-panel" aria-live="polite">
      <div class="chatbot-head">
        <span class="bot-avatar"><span></span></span>
        <div>
          <h3>Creative HR Assistant</h3>
          <p>Ask about jobs, recruitment, resume writing, or contact support.</p>
        </div>
      </div>
      <div class="chatbot-messages"></div>
      <div class="chatbot-quick">
        <button type="button" data-question="What services do you provide?">Services</button>
        <button type="button" data-question="How can I upload my resume?">Upload Resume</button>
        <button type="button" data-question="What is your contact number?">Contact</button>
        <button type="button" data-question="Where is your office address?">Address</button>
      </div>
      <form class="chatbot-form">
        <input type="text" placeholder="Type your question..." autocomplete="off" required>
        <button type="submit">Send</button>
      </form>
      <a class="chatbot-whatsapp" href="https://wa.me/919327434300" target="_blank" rel="noopener">Continue on WhatsApp</a>
    </div>
  `;

  document.body.appendChild(widget);

  const toggle = widget.querySelector('.chatbot-toggle');
  const panel = widget.querySelector('.chatbot-panel');
  const messages = widget.querySelector('.chatbot-messages');
  const form = widget.querySelector('.chatbot-form');
  const input = form.querySelector('input');

  addChatMessage(messages, 'Hello! I am Creative HR Assistant. I can help with recruitment, resume writing, job openings, resume upload, address, and contact details.', 'bot');

  toggle.addEventListener('click', () => {
    widget.classList.toggle('is-open');
    if (widget.classList.contains('is-open')) {
      setTimeout(() => input.focus(), 180);
    }
  });

  widget.querySelectorAll('.chatbot-quick button').forEach((button) => {
    button.addEventListener('click', () => {
      const question = button.dataset.question;
      addChatMessage(messages, question, 'user');
      botReplyWithTyping(messages, question);
    });
  });

  form.addEventListener('submit', (event) => {
    event.preventDefault();
    const question = input.value.trim();
    if (!question) return;
    addChatMessage(messages, question, 'user');
    input.value = '';
    botReplyWithTyping(messages, question);
  });
}

createChatbot();
