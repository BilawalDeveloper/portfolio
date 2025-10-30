# MCP Server API Specification

## Overview

The MCP (Model Control Protocol) server provides an AI-powered chatbot interface for the portfolio website. It handles natural language queries about the developer's projects, skills, experience, and uploaded CVs.

## Architecture

```
┌─────────────┐      ┌──────────────┐      ┌─────────────┐
│   Client    │─────▶│ MCP Server   │─────▶│ LLM Provider│
│ (Chat Widget)│◀─────│ (Laravel)    │◀─────│ (OpenAI etc)│
└─────────────┘      └──────────────┘      └─────────────┘
                            │
                            ▼
                     ┌──────────────┐
                     │  Knowledge   │
                     │   Base       │
                     │ (Portfolio + │
                     │   Resumes)   │
                     └──────────────┘
```

## API Endpoints

### POST /api/chat
Start or continue a chat conversation.

**Request:**
```json
{
  "message": "Tell me about your AI projects",
  "session_id": "uuid-v4-string",
  "context": {
    "country": "US",
    "language": "en"
  }
}
```

**Response:**
```json
{
  "response": "I have several AI projects...",
  "session_id": "uuid-v4-string",
  "sources": [
    {
      "type": "project",
      "id": 1,
      "title": "Image Classification System"
    }
  ],
  "metadata": {
    "model": "gpt-4",
    "tokens_used": 150,
    "confidence": 0.95
  }
}
```

### GET /api/chat/history/{session_id}
Retrieve chat history for a session.

### DELETE /api/chat/session/{session_id}
Clear a chat session.

## Knowledge Base Structure

Portfolio content and parsed resumes are indexed and made available to the LLM for context-aware responses.

## LLM Integration

### Supported Providers
1. **OpenAI** (GPT-4, GPT-3.5)
2. **Anthropic** (Claude)
3. **Local Models** (Ollama, LM Studio)

### Configuration
```env
LLM_PROVIDER=openai
OPENAI_API_KEY=sk-...
OPENAI_MODEL=gpt-4
CHAT_RATE_LIMIT=60
```

## Security

- Rate limiting per session and IP
- Content filtering and validation
- Privacy controls and data expiration
- PII detection and masking

## Future Enhancements

1. Streaming responses
2. Voice input support
3. Multi-language support
4. Vector search for better context retrieval
5. Analytics dashboard

See full specification for implementation details and timeline.
