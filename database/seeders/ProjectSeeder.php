<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = [
            [
                'title' => 'Enterprise RAG System',
                'slug' => 'enterprise-rag-system',
                'description' => 'Built a production-ready RAG system using LangChain, Pinecone, and GPT-4. Processes 10M+ documents with 95% accuracy in information retrieval.',
                'long_description' => 'Developed a production-ready Retrieval-Augmented Generation (RAG) system that revolutionizes how enterprises access and utilize their knowledge base. The system integrates LangChain for orchestration, Pinecone for vector storage, and GPT-4 for intelligent responses, processing over 10 million documents with exceptional accuracy.',
                'tags' => ['RAG', 'LangChain', 'Pinecone', 'GPT-4'],
                'technologies' => ['Python', 'LangChain', 'Pinecone', 'GPT-4', 'FastAPI', 'PostgreSQL', 'Redis', 'Docker'],
                'features' => [
                    'Intelligent document chunking and embedding',
                    'Hybrid search combining vector and keyword search',
                    'Multi-turn conversational context',
                    'Source attribution and citation tracking',
                    'Real-time document ingestion pipeline',
                    'Advanced query understanding and reformulation'
                ],
                'challenge' => 'Large enterprises struggle with information silos and inefficient knowledge retrieval across massive document repositories. Traditional search methods fail to understand context and semantic meaning, leading to poor user experience and wasted time.',
                'solution' => 'Implemented a sophisticated RAG pipeline that combines semantic search with GPT-4\'s language understanding. The system chunks documents intelligently, creates high-quality embeddings, and retrieves relevant context before generating accurate, cited responses.',
                'results' => '95% accuracy in information retrieval, 70% reduction in time spent searching for information, processing 10M+ documents, sub-2 second query response time, and 90% user satisfaction rate.',
                'project_type' => 'AI/ML - Enterprise',
                'featured' => true,
                'order' => 1,
                'published_at' => now()->subMonths(2),
            ],
            [
                'title' => 'Multi-Agent AI System',
                'slug' => 'multi-agent-ai-system',
                'description' => 'Developed an autonomous multi-agent system with specialized agents for research, writing, and coding. Orchestrates complex workflows with 80% task completion rate.',
                'long_description' => 'Created an advanced multi-agent AI system where specialized agents collaborate to accomplish complex tasks. The system uses LangGraph for agent orchestration, with each agent having specific expertise (research, writing, coding) and the ability to delegate sub-tasks.',
                'tags' => ['AI Agents', 'LangGraph', 'Claude', 'Python'],
                'technologies' => ['Python', 'LangGraph', 'Claude', 'GPT-4', 'Redis', 'PostgreSQL', 'FastAPI', 'Docker'],
                'features' => [
                    'Specialized agent roles (Researcher, Writer, Coder, Planner)',
                    'Autonomous task decomposition and planning',
                    'Inter-agent communication and collaboration',
                    'Tool use and function calling',
                    'Memory and context management',
                    'Self-correction and validation mechanisms'
                ],
                'challenge' => 'Complex tasks require diverse skills and extensive coordination. Single AI agents often struggle with multi-step workflows and lack the specialization needed for different domains.',
                'solution' => 'Designed a multi-agent architecture where specialized agents work together, each leveraging their domain expertise. A planner agent coordinates the workflow while specialist agents handle specific tasks, enabling complex problem-solving.',
                'results' => '80% task completion rate on complex workflows, 60% faster than single-agent approaches, capable of handling 50+ tool integrations, and scalable to 10+ concurrent agent teams.',
                'project_type' => 'AI/ML - Autonomous Systems',
                'featured' => true,
                'order' => 2,
                'published_at' => now()->subMonths(3),
            ],
            [
                'title' => 'Semantic Search Engine',
                'slug' => 'semantic-search-engine',
                'description' => 'Created a neural search engine using sentence transformers and ChromaDB. Achieves 92% relevance in search results with sub-50ms query latency.',
                'long_description' => 'Developed a high-performance semantic search engine that understands user intent beyond keyword matching. Using advanced embedding models and hybrid retrieval strategies, the system delivers highly relevant results with lightning-fast query response times.',
                'tags' => ['Embeddings', 'ChromaDB', 'FastAPI', 'React'],
                'technologies' => ['Python', 'Sentence Transformers', 'ChromaDB', 'FastAPI', 'React', 'TypeScript', 'Redis', 'Docker'],
                'features' => [
                    'Advanced semantic understanding using transformer models',
                    'Hybrid search combining embeddings and BM25',
                    'Query expansion and reformulation',
                    'Faceted filtering and result ranking',
                    'Real-time indexing pipeline',
                    'Personalized search results'
                ],
                'challenge' => 'Traditional keyword-based search fails to understand user intent and context, resulting in irrelevant results. Users need a system that comprehends semantic meaning and delivers truly relevant content.',
                'solution' => 'Implemented a neural search system using state-of-the-art sentence transformers to create dense embeddings. Combined with ChromaDB for efficient vector search and hybrid ranking algorithms for optimal results.',
                'results' => '92% search relevance score, sub-50ms query latency, 5M+ indexed documents, 100K+ daily searches, and 85% user satisfaction increase.',
                'project_type' => 'AI/ML - Search',
                'featured' => true,
                'order' => 3,
                'published_at' => now()->subMonths(4),
            ],
            [
                'title' => 'AI Code Assistant',
                'slug' => 'ai-code-assistant',
                'description' => 'Built an intelligent code assistant powered by GPT-4 with function calling. Provides context-aware suggestions and automates development workflows.',
                'long_description' => 'Created a sophisticated AI code assistant that understands codebases, provides intelligent suggestions, generates code, and automates repetitive development tasks. Integrated directly into the development environment for seamless workflow.',
                'tags' => ['GPT-4', 'Function Calling', 'TypeScript', 'VSCode'],
                'technologies' => ['TypeScript', 'GPT-4', 'Node.js', 'AST Parsing', 'Git', 'VSCode API', 'Docker'],
                'features' => [
                    'Intelligent code completion and generation',
                    'Context-aware refactoring suggestions',
                    'Automated test generation',
                    'Documentation generation',
                    'Bug detection and fixing',
                    'Codebase Q&A and explanation'
                ],
                'challenge' => 'Developers spend significant time on repetitive tasks, searching documentation, and understanding unfamiliar code. Generic AI assistants lack the context needed for meaningful development help.',
                'solution' => 'Built a specialized AI assistant that analyzes entire codebases, understands project context, and leverages GPT-4\'s function calling for precise tool use. Integrated directly into the IDE for frictionless assistance.',
                'results' => '40% reduction in development time for routine tasks, 90% accurate code suggestions, 50K+ developers using the tool, and 4.8/5 user rating.',
                'project_type' => 'AI/ML - Developer Tools',
                'featured' => true,
                'order' => 4,
                'published_at' => now()->subMonths(5),
            ],
            [
                'title' => 'Voice AI Platform',
                'slug' => 'voice-ai-platform',
                'description' => 'Developed a voice-enabled AI platform using Whisper for STT and ElevenLabs for TTS. Supports 50+ languages with 98% transcription accuracy.',
                'long_description' => 'Built a comprehensive voice AI platform enabling natural voice interactions with AI assistants. The system combines OpenAI\'s Whisper for speech-to-text, GPT-4 for intelligence, and ElevenLabs for natural text-to-speech, supporting multilingual conversations with high accuracy.',
                'tags' => ['Whisper', 'TTS', 'WebRTC', 'Next.js'],
                'technologies' => ['Python', 'Whisper', 'GPT-4', 'ElevenLabs', 'WebRTC', 'Next.js', 'TypeScript', 'Redis', 'WebSocket'],
                'features' => [
                    'Real-time speech-to-text with Whisper',
                    'Natural text-to-speech with ElevenLabs',
                    'Multi-turn conversational AI',
                    '50+ language support',
                    'Emotion and tone detection',
                    'Background noise cancellation'
                ],
                'challenge' => 'Voice interfaces often suffer from poor transcription accuracy, unnatural speech synthesis, and high latency. Supporting multiple languages while maintaining quality is extremely challenging.',
                'solution' => 'Integrated best-in-class models for each component: Whisper for accurate transcription, GPT-4 for intelligent responses, and ElevenLabs for natural voice synthesis. Optimized the pipeline for sub-500ms latency.',
                'results' => '98% transcription accuracy, 50+ languages supported, 100K+ voice sessions processed, sub-500ms response latency, and natural-sounding speech synthesis.',
                'project_type' => 'AI/ML - Voice',
                'featured' => true,
                'order' => 5,
                'published_at' => now()->subMonths(6),
            ],
            [
                'title' => 'AI Image Generator',
                'slug' => 'ai-image-generator',
                'description' => 'Created a web-based AI image generator using Stable Diffusion XL and DALL-E 3. Features advanced prompt engineering and style transfer capabilities.',
                'long_description' => 'Developed a powerful AI image generation platform that combines multiple state-of-the-art models. Users can generate high-quality images from text descriptions, apply style transfers, and fine-tune results with advanced controls.',
                'tags' => ['Stable Diffusion', 'DALL-E', 'PyTorch', 'FastAPI'],
                'technologies' => ['Python', 'Stable Diffusion XL', 'DALL-E 3', 'PyTorch', 'FastAPI', 'React', 'Redis', 'S3'],
                'features' => [
                    'Multiple model support (SD XL, DALL-E 3)',
                    'Advanced prompt engineering tools',
                    'Style transfer and mixing',
                    'Inpainting and outpainting',
                    'ControlNet integration',
                    'Batch generation and variations'
                ],
                'challenge' => 'AI image generation tools are often complex, require technical knowledge, and produce inconsistent results. Users need an intuitive interface with powerful controls and reliable output quality.',
                'solution' => 'Created a user-friendly platform that abstracts away complexity while providing advanced controls for power users. Implemented intelligent prompt engineering and model selection to maximize output quality.',
                'results' => '1M+ images generated, 4.7/5 average quality rating, 50K+ registered users, sub-30 second generation time, and 95% first-attempt satisfaction rate.',
                'project_type' => 'AI/ML - Computer Vision',
                'featured' => true,
                'order' => 6,
                'published_at' => now()->subMonths(7),
            ],
        ];

        foreach ($projects as $projectData) {
            Project::create($projectData);
        }
    }
}
